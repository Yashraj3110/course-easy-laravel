<?php

// Set Laravel base path
define('LARAVEL_START', microtime(true));
$basePath = dirname(__DIR__); // points to project root

require $basePath . '/vendor/autoload.php';
$app = require_once $basePath . '/bootstrap/app.php';

// Run the kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);
