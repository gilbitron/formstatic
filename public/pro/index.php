<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Formstatic Pro</title>

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
        <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-5">Formstatic Pro</h1>
        <p class="text-xl mb-4">Like the idea of Formstatic but want a few more features?</p>
        <p class="mb-4">These are some of the things we currently have in mind:</p>
        <ul class="list-disc mb-4 pl-6">
            <li>Hosted custom thankyou/error pages (with no Formstatic branding).</li>
            <li>Custom email templates.</li>
            <li>Spam protection.</li>
            <li>File uploads.</li>
            <li>Advanced processors (e.g. Zapier).</li>
            <li>Hosted platform to store submissions (including notifications).</li>
        </ul>
        <p class="mb-4">If this sounds like something you'd be interested in and willing to pay a small annual fee for, pop your details in the form below to be the first to be notified when we launch!</p>

        <form action="https://sendy.dev7studios.co/subscribe" method="post" class="mt-10">
            <input type="hidden" name="list" value="NZwAeywJvroLkjs8bjWDDw"/>
            <input type="hidden" name="subform" value="yes"/>

            <div class="mb-4">
                <label for="name" class="block text-gray-900 mb-1">Your Full Name</label>
                <input type="text" id="name" name="name" placeholder="Joe Bloggs" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-900 mb-1">Your Email Address</label>
                <input type="text" id="email" name="email" placeholder="email@example.com" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="gdpr">
                    <input type="checkbox" name="gdpr" id="gdpr" class="mr-2">
                    <span class="text-sm"><strong>Marketing permission</strong>: I give my consent to Formstatic to be in touch with me via email using the information I have provided in this form for the purpose of news, updates and marketing.</span>
                </label>
            </div>
            <div style="display:none;">
                <label for="hp">HP</label><br/>
                <input type="text" name="hp" id="hp"/>
            </div>
            <button type="submit" class="btn btn-primary">
                I'm interested. Sign me up!
            </button>
        </form>
    </section>

    <?php include dirname(__DIR__) . '/partials/footer.php' ?>
</div>
</body>
</html>
