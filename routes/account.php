<?php

// Displays Account info
$router->get('/account/', function() use ($db){
	$account = new App\Account($db);
	$account_info = $account->getAccount($_SESSION['account_no']);

   $transaction = new App\Transaction($db);
   $transaction_info = $transaction->getBalance($_SESSION['account_no']);
   Dabl\View\View::load('account',['account_info'=>$account_info,'transaction_info'=>$transaction_info]);
});

// Displays Withdraw form
$router->get('/withdraw/', function(){
   	Dabl\View\View::load('withdraw');
});

// Processes Withdraw form
$router->post('/withdraw/', function() use ($db){
   	$amount = $_POST['amount'];
   	$transaction = new App\Transaction($db);
   	$transaction_info = $transaction->withdraw($_SESSION['account_no'],$amount);
   	
   	if($transaction_info){
   		echo 'Success';
   	}
});


// Displays Deposit form
$router->get('/deposit/', function(){
   	Dabl\View\View::load('deposit');
});

// Processes Deposit form
$router->post('/deposit/', function() use ($db){
   	$amount = $_POST['amount'];
   	$transaction = new App\Transaction($db);
   	$transaction_info = $transaction->deposit($_SESSION['account_no'],$amount);
   	
   	if($transaction_info){
   		echo 'Success';
   	}
});


// Displays Transfer form
$router->get('/transfer/', function() use ($db){
	$accounts = new App\Account($db);
   	Dabl\View\View::load('transfer',['accounts'=>$accounts->getAccounts()]);
});

// Processes Transfer form
$router->post('/transfer/', function() use ($db){
   	$amount = $_POST['amount'];
   	$account = $_POST['account'];
   	$transaction = new App\Transaction($db);
   	$transaction_info = $transaction->transfer($_SESSION['account_no'],$account,$amount);
   	
   	if($transaction_info){
   		echo 'Success';
   	}
});

// Displays Transfer form
$router->get('/transactions/', function() use ($db){
	$transactions = new App\Transaction($db);
	$transaction_info = $transactions->getTransactions($_SESSION['account_no']);
   	Dabl\View\View::load('transaction',['transactions'=>$transaction_info]);
});