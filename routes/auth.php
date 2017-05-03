<?php

// Displays login form
$router->get('/login/', function() use ($msg) {
    Dabl\View\View::load('login',['msg'=>$msg]);
});

// Processes login
$router->post('/login/', function() use ($db,$msg) {
	$account_no = $_POST['account_no'];
	$pin = $_POST['pin'];

	$auth = new App\Auth($db);
	$login = $auth->login($account_no,$pin);
   	
	if($login){
      $msg->success('You are logged in');
		header("Location: /account");
	   die();
	}else{
      $msg->error('Incorrect details');
		Dabl\View\View::load('login',['msg'=>$msg]);
	}
});

// Displays login form
$router->get('/logout/', function() use ($msg) {
    session_destroy();
    
    $msg->success('You are logged out');
    header("Location: /login");
	die();
});