<?php
// Landing page route
$router->get('/', function() {
    Dabl\View\View::load('default');
}); 


// Register account
$router->get('/register/(\d+)/(\d+)/(\w+)', function($account_no,$pin,$name) use ($db) {
   $account = new App\Account($db);
   $account->createAccount($account_no,$pin,$name);
   echo 'Account created';
});