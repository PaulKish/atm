<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

Dabl\View\View::addDirectory(__DIR__ . '/views'); // point to views folder 

// Create Router instance
$router = new \Bramus\Router\Router();

// Include all routes from route folder
foreach(glob('routes/*.php') as $file) {
    include_once $file;
}

// Run it
$router->run();