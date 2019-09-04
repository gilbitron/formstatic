<?php

require dirname(__DIR__) . '/bootstrap.php';

$storage = new \bandwidthThrottle\tokenBucket\storage\SessionStorage('formstatic');
$rate    = new \bandwidthThrottle\tokenBucket\Rate(10, \bandwidthThrottle\tokenBucket\Rate::MINUTE);
$bucket  = new \bandwidthThrottle\tokenBucket\TokenBucket(10, $rate, $storage);
$bucket->bootstrap(10);

if (!$bucket->consume(1, $seconds)) {
    http_response_code(429);
    header(sprintf("Retry-After: %d", floor($seconds)));
    echo "Too Many Requests";
    exit;
}

$data    = [];
$options = [];

foreach ($_POST as $key => $value) {
    $key = filter_var($key, FILTER_SANITIZE_STRING);

    if (strpos($key, '$') === 0) {
        $options[ltrim($key, '$')] = $value;
        continue;
    }

    $data[$key] = $value;
}

if (empty($options['processor'])) {
    $options['processor'] = 'email';
}

if ($options['processor'] === 'email') {
    $processor = new \Formstatic\Processors\EmailProcessor();
}
if ($options['processor'] === 'webhook') {
    $processor = new \Formstatic\Processors\WebhookProcessor();
}
if ($options['processor'] === 'test') {
    $processor = new \Formstatic\Processors\TestProcessor();
}

$message = 'Thanks for your submission.';
$error   = false;

if (empty($processor)) {
    $error   = true;
    $message = "Invalid processor: {$options['processor']}";
} else {
    try {
        $returnMessage = $processor->processData($data, $options);

        if ($returnMessage) {
            $message = $returnMessage;
        }
    } catch (\Formstatic\Exceptions\ValidationException $e) {
        $error   = true;
        $message = $e->getMessage();
    } catch (\Exception $e) {
        $error   = true;
        $message = 'Whoops. It looks like something went wrong processing your submission.';

        if (isDebug()) {
            $message .= "\n\nError: {$e->getMessage()}\n{$e->getTraceAsString()}\n";
        }
    }
}

if (!empty($options['redirect_to'])) {
    header('Location: ' . $options['redirect_to']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo appName() ?></title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
</head>
<body class="antialiased bg-gray-100">
<div class="container mx-auto px-4 lg:max-w-3xl xl:max-w-3xl min-h-screen">
    <div class="flex justify-center items-center flex-col min-h-screen">
        <div class="bg-white rounded-lg w-full px-24 py-20 shadow-lg overflow-auto">
            <?php if ($error) { ?>
                <h1 class="text-4xl font-bold text-red-700 leading-tight mb-5">Error</h1>
            <?php } else { ?>
                <h1 class="text-4xl font-bold text-green-700 leading-tight mb-5">Success</h1>
            <?php } ?>
            <p class="text-lg text-gray-600"><?php echo nl2br($message) ?></p>
        </div>
        <p class="mt-10 text-gray-500">Powered by <a href="https://formstatic.dev" target="_blank" class="font-bold"><?php echo appName() ?></a></p>
    </div>
</div>
</body>
</html>
