<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';
use Medoo\Medoo;

session_start();

Dabl\View\View::addDirectory(__DIR__ . '/views'); // point to views folder 

// Create Router instance
$router = new \Bramus\Router\Router();

// Initialize Medoo
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'atm',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
]);

// Include all routes from route folder
foreach(glob('routes/*.php') as $file) {
    include_once $file;
}

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    Dabl\View\View::load('404');
});

// Run it
$router->run();