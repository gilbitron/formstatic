<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Privacy Policy - Formstatic</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <?php
    if (file_exists(dirname(__DIR__) . '/partials/analytics.php')) {
        include dirname(__DIR__) . '/partials/analytics.php';
    }
    ?>
</head>
<body class="antialiased">
    <div class="container mx-auto px-6 lg:max-w-3xl xl:max-w-3xl">
        <?php include dirname(__DIR__) . '/partials/header.php' ?>

        <section class="docs text-gray-600 mb-20">
            <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-5">Privacy Policy</h1>
            <p class="mb-4">Your privacy is important to us. It is Dev7studios Ltd's policy to respect your privacy regarding any information we may collect from you across our website, <a href="https://formstatic.dev">https://formstatic.dev</a>, and other sites we own and operate.</p>
            <p class="mb-4">We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</p>
            <p class="mb-4">We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorised access, disclosure, copying, use or modification.</p>
            <p class="mb-4">We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</p>
            <p class="mb-4">Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p>
            <p class="mb-4">You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</p>
            <p class="mb-4">Your continued use of our website will be regarded as acceptance of our practices around privacy and personal information. If you have any questions about how we handle user data and personal information, feel free to contact us.</p>
            <p class="mb-4">This policy is effective as of 3 September 2019.</p>
        </section>

        <?php include dirname(__DIR__) . '/partials/footer.php' ?>
    </div>
</body>
</html>
