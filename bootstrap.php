<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();
}

if (!function_exists('env')) {
    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return isset($_ENV[$key]) ? $_ENV[$key] : $default;
    }
}

if (!function_exists('appName')) {
    /**
     * @return string
     */
    function appName()
    {
        return isset($_ENV['APP_NAME']) ? $_ENV['APP_NAME'] : 'Formstatic';
    }
}

if (!function_exists('isDebug')) {
    /**
     * @return string
     */
    function isDebug()
    {
        return isset($_ENV['DEBUG']) && $_ENV['DEBUG'] == 'true';
    }
}
