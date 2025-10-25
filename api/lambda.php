<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Set up writable directories in /tmp for Vercel
$_ENV['APP_STORAGE'] = '/tmp/storage';

// Create necessary storage directories
$storageDirs = [
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
