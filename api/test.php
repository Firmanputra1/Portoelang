<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    echo "<pre>Bootstrapping Laravel...\n";
    require __DIR__ . '/../vendor/autoload.php';
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "Kernel loaded.\n";
    
    // Boot the application
    $app->boot();
    echo "Application booted successfully!\n";
} catch (\Throwable $e) {
    echo "\n--- CAUGHT EXCEPTION ---\n";
    echo "Class: " . get_class($e) . "\n";
    echo "Message: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
