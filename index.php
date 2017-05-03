<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

use App\Account;
use App\Transaction;
use App\Auth;
use Medoo\Medoo;
use Plasticbrain\FlashMessages\FlashMessages;
use Dabl\View\View;
use Bramus\Router\Router;

session_start(); // Start a session

View::addDirectory(__DIR__ . '/views'); // Point to views folder 

$msg = new FlashMessages(); // Flash messages

$router = new Router(); // Create Router instance

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

// Customize 404
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    Dabl\View\View::load('404');
});

// Prevent unauthorized access
$router->before('GET|POST','/account/', function() use ($msg) {
    if (!isset($_SESSION['logged_in'])) {
        $msg->error('You need to login');
        header('location: /login');
        exit();
    }
});

// Prevent unauthorized access to routes under account
$router->before('GET|POST','/account/.*', function() use ($msg){
    if (!isset($_SESSION['logged_in'])) {
        $msg->error('You need to login');
        header('location: /login');
        exit();
    }
});

// Run it
$router->run();