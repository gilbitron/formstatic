<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Docs - Formstatic</title>

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
            <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-5">Docs</h1>
            <p class="text-xl mb-4">Formstatic is an HTML form submission API. Simply create your HTML form as you would normally but configure it to <code class="text-base text-indigo-600">POST</code> to <code class="text-base text-indigo-600">https://formstatic.dev</code> and we'll handle the form submission process. By adding a few hidden fields to your form you can tell Formstatic how to handle your submissions. No account or API key required.</p>
            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-4 overflow-auto whitespace-pre-wrap"><code>&lt;<span class="text-red-400">form</span> <span class="text-yellow-400">action</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">https://formstatic.dev</span>&quot; <span class="text-yellow-400">method</span>=&quot;<span class="text-green-300">post</span>&quot;&gt;
    &hellip;
&lt;/<span class="text-red-400">form</span>&gt;</code></pre>

            <h2 class="text-2xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="processors">Processors</h2>
            <p class="mb-4">Form submissions are handled by "processors" which are configured by adding hidden fields to your form. Processor configuration field names are prefixed with a <code class="text-base text-indigo-600">$</code> and are excluded from the submission data. To specify which processor to use, add a <code class="text-base text-indigo-600">$processor</code> field to your form:</p>
            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-4 overflow-auto whitespace-pre-wrap"><code>&lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$processor</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">email</span>&quot;&gt;</code></pre>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="email-processor">Email Processor</h3>
            <p class="mb-4">The <code class="text-base text-indigo-600">email</code> processor sends an email containing the form data to an email address you specify using the <code class="text-base text-indigo-600">$to</code> field:</p>
            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-4 overflow-auto whitespace-pre-wrap"><code>&lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$to</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">hello@example.com</span>&quot;&gt;</code></pre>
            <p class="mb-4">The following fields are available:</p>
            <ul class="list-disc mb-4 pl-6">
                <li><code class="text-base text-indigo-600">$to</code> &mdash; An email address to send submissions to.</li>
                <li><code class="text-base text-indigo-600">$reply_to</code> &mdash; (optional) Specify the reply-to email address.</li>
                <li><code class="text-base text-indigo-600">$subject</code> &mdash; (optional) Specify the subject (default: Formstatic Submission).</li>
                <li><code class="text-base text-indigo-600">$cc</code> &mdash; (optional) Add a CC email address.</li>
                <li><code class="text-base text-indigo-600">$bcc</code> &mdash; (optional) Add a BCC email address.</li>
            </ul>
            <p class="mb-4">Emails are sent by Amazon SES from <code class="text-base text-indigo-600">&#115;&#117;&#98;&#109;&#105;&#115;&#115;&#105;&#111;&#110;&#115;&#64;&#102;&#111;&#114;&#109;&#115;&#116;&#97;&#116;&#105;&#99;&#46;&#100;&#101;&#118;</code>.</p>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="webhook-processor">Webhook Processor</h3>
            <p class="mb-4">The <code class="text-base text-indigo-600">webhook</code> processor sends a HTTP request containing the form data to an <code class="text-base text-indigo-600">$endpoint</code>:</p>
            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-4 overflow-auto whitespace-pre-wrap"><code>&lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$endpoint</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">https://myapi.com</span>&quot;&gt;</code></pre>
            <p class="mb-4">By default, the processor will send an <code class="text-base text-indigo-600">application/x-www-form-urlencoded</code> <code class="text-base text-indigo-600">POST</code> request.</p>
            <p class="mb-4">The following fields are available:</p>
            <ul class="list-disc mb-4 pl-6">
                <li><code class="text-base text-indigo-600">$endpoint</code> &mdash; The endpoint to send the HTTP request to.</li>
                <li><code class="text-base text-indigo-600">$method</code> &mdash; (optional) The HTTP method (either <code class="text-base text-indigo-600">GET</code> or <code class="text-base text-indigo-600">POST</code>).</li>
                <li><code class="text-base text-indigo-600">$as_json</code> &mdash; (optional) If <code class="text-base text-indigo-600">true</code> the form data will be sent as JSON with a Content-Type header of <code class="text-base text-indigo-600">application/json</code>.</li>
            </ul>

            <h3 class="text-xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="webhook-processor">Looking for more processors?</h3>
            <p class="mb-4">Formstatic is open source which means you can <a href="https://github.com/gilbitron/formstatic/labels/processor%20suggestion">suggest a new processor</a> you would like to see added, or even build your own and <a href="https://github.com/gilbitron/formstatic/pulls">submit a pull request</a>.</p>

            <h2 class="text-2xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="webhook-processor">Global Fields</h2>
            <p class="mb-4">Some fields can apply to any processor.</p>
            <pre class="bg-blue-900 text-blue-100 rounded-lg px-6 py-5 mb-4 overflow-auto whitespace-pre-wrap"><code>&lt;<span class="text-red-400">input</span> <span class="text-yellow-400">type</span>=&quot;<span class="text-green-300">hidden</span>&quot; <span class="text-yellow-400">name</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">$redirect_to</span>&quot; <span class="text-yellow-400">value</span>=&quot;<span class="text-pink-200 bg-indigo-700 px-2 font-bold rounded-sm">https://example.com/thanks</span>&quot;&gt;</code></pre>
            <p class="mb-4">The following global fields are available:</p>
            <ul class="list-disc mb-4 pl-6">
                <li><code class="text-base text-indigo-600">$redirect_to</code> &mdash; After a successful submission the user will be redirected to this URL instead of being shown the Formstatic success page.</li>
            </ul>

            <h2 class="text-2xl font-bold text-gray-900 leading-tight mb-3 mt-10" id="webhook-processor">Found a bug?</h2>
            <p class="mb-4">Please report any non-security related bugs in the <a href="https://github.com/gilbitron/formstatic/issues">GitHub repository</a>. If you find a security vulnerability please send the details to <a href="mailto:&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#64;&#102;&#111;&#114;&#109;&#115;&#116;&#97;&#116;&#105;&#99;&#46;&#100;&#101;&#118;">&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#64;&#102;&#111;&#114;&#109;&#115;&#116;&#97;&#116;&#105;&#99;&#46;&#100;&#101;&#118;</a>.</p>
        </section>

        <?php include dirname(__DIR__) . '/partials/footer.php' ?>
    </div>
</body>
</html>
