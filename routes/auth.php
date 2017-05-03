<?php

// Displays login form
$router->get('/login/', function() {
   Dabl\View\View::load('login');
});

// Processes login
$router->post('/login/', function() use ($db) {
	$account_no = $_POST['account_no'];
	$pin = $_POST['pin'];

	$auth = new App\Auth($db);
	$login = $auth->login($account_no,$pin);
   	
   	if($login){
   		header("Location: /account");
		die();
   	}else{
   		Dabl\View\View::load('login',['status'=>'Incorrect details']);
   	}
});

// Displays login form
$router->get('/logout/', function() {
   	session_destroy();
   	header("Location: /login");
	die();
});