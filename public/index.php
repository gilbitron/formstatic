<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/process.php';
    exit;
}

require dirname(__DIR__) . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo appName() ?> - HTML form processing for static websites.</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <?php
    if (file_exists(__DIR__ . '/partials/analytics.php')) {
        include __DIR__ . '/partials/analytics.php';
    }
    ?>
</head>
<body class="antialiased">
    <div class="container mx-auto px-6 lg:max-w-3xl xl:max-w-3xl">
        <?php include __DIR__ . '/partials/header.php' ?>

        <section class="hero mb-20">
            <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-3">HTML form processing for static websites</h1>
            <h2 class="text-2xl font-normal text-gray-600 leading-tight mb-10"><span class="highlight">No sign up required!</span></h2>

            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-10 overflow-auto whitespace-pre-wrap"><code><span class="text-gray-500">&lt;!-- Example Contact Form --&gt;</span>
&lt;<span class="text-red-400">form</span> <span class="text-yellow-400">action</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">https://formstatic.dev</span>&quot; <span class="text-yellow-400">method</span>=&quot;<span class="text-green-300">post</span>&quot;&gt;
    &lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$processor</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">email</span>&quot;&gt;
    &lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$to</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">hello@example.com</span>&quot;&gt;

    &lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">text</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-green-300">name</span>&quot; <span class="text-yellow-400">placeholder</span>=&quot;<span class="text-green-300">Your Name</span>&quot;&gt;
    &lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">text</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-green-300">email</span>&quot; <span class="text-yellow-400">placeholder</span>=&quot;<span class="text-green-300">Your Email</span>&quot;&gt;
    &lt;<span class="text-red-400">textarea</span> <span class="text-yellow-400">name</span>=&quot;<span class="text-green-300">message</span>&quot; <span class="text-yellow-400">placeholder</span>=&quot;<span class="text-green-300">Your Message</span>&quot;&gt;&lt;/<span class="text-red-400">textarea</span>&gt;
    &lt;<span class="text-red-400">button</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">submit</span>&quot;&gt;Submit&lt;/<span class="text-red-400">button</span>&gt;
&lt;/<span class="text-red-400">form</span>&gt;</code></pre>

            <p class="text-xl text-gray-600 mb-5">Simply configure your form to <code class="text-base text-indigo-600">POST</code> to <code class="text-base text-indigo-600">https://formstatic.dev</code> and add the required input fields to configure the processor.</p>
            <p><a href="/docs" class="btn btn-primary">Read the Docs &rarr;</a></p>
        </section>

        <section class="explainer text-gray-600 mb-20">
            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3">Forget about a backend</h3>
            <p class="mb-4">Building static sites is becoming increasingly popular because of the improved simplicity, performance and security of not having to worry about backend server software.</p>
            <p class="mb-4">But what about those times when your static site needs a bit of interactivity? Say you need add a contact form to your site, or you want your visitors to sign up to a newsletter. How do you implement that without a backend?</p>
            <p class="mb-4">That's where Formstatic comes in. Simply create your HTML form as you would normally but configure it to post to https://formstatic.dev and we'll handle the form submission process. By adding a few hidden fields to your form you can tell Formstatic how to handle your submissions.</p>
            <p class="mb-4">You don't even need to sign up for an account! Formstatic just routes any submissions to the destination you choose via "processors". For example, Formstatic currently has processors to:</p>
            <ul class="list-disc mb-4 pl-6">
                <li>Send an email to an email address you specify with the contents of the form</li>
                <li>Send a GET/POST webhook to a specific endpoint with the contents of the form (as form params or as JSON)</li>
                <li>More processors coming soon&hellip;</li>
            </ul>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-8">What about security?</h3>
            <p class="mb-4">Formstatic uses the latest TLS encryption standards to encrypt any data you send to us.</p>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-8">What about privacy?</h3>
            <p class="mb-4">Formstatic does it's best to keep your data private. We never store or log any data you send to us. Formstatic is also <a href="https://github.com/gilbitron/formstatic">open source</a> meaning you can always host your own version of Formstatic if privacy is a concern.</p>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-8">How much does it cost?</h3>
            <p class="mb-4">Formstatic is free to use.</p>
        </section>

        <?php include __DIR__ . '/partials/footer.php' ?>
    </div>
</body>
</html>
