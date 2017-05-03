<?php

// group the routes together under account
$router->mount('/account', function() use ($router,$db,$msg) {

	// Displays Account info
	$router->get('/', function() use ($db,$msg){
		$account = new App\Account($db);
		$account_info = $account->getAccount($_SESSION['account_no']);

		$transaction = new App\Transaction($db);
		$transaction_info = $transaction->getBalance($_SESSION['account_no']);
		Dabl\View\View::load('account',[
			'account_info'=>$account_info,
			'transaction_info'=>$transaction_info,
			'msg' => $msg
		]);
   	});

   	// Displays Withdraw form
   	$router->get('/withdraw/', function(){
		Dabl\View\View::load('withdraw');
   	});

   	// Processes Withdraw form
   	$router->post('/withdraw/', function() use ($db,$msg){
		$amount = $_POST['amount'];

		// check is amount is numeric
		if(!is_numeric() || $amount >= 0){
			$msg->error('Withdrawal failed, please ensure the amount is correct');
			header('location: /account');
			exit();
		}

		$transaction = new App\Transaction($db);
		$transaction_info = $transaction->withdraw($_SESSION['account_no'],$amount);
		
		if($transaction_info){
			$msg->success('Withdrawal successful');
			header('location: /account');
			exit();
		}else{
			$msg->error('Withdrawal failed, please ensure the amount is not greater than the account balance');
			header('location: /account');
			exit();
		}
   	});


   	// Displays Deposit form
   	$router->get('/deposit/', function(){
		Dabl\View\View::load('deposit');
   	});

   	// Processes Deposit form
   	$router->post('/deposit/', function() use ($db,$msg){
		$amount = $_POST['amount'];

		// check is amount is numeric
		if(!is_numeric() || $amount >= 0){
			$msg->error('Deposit failed, please ensure the amount is correct');
			header('location: /account');
			exit();
		}

		$transaction = new App\Transaction($db);
		$transaction_info = $transaction->deposit($_SESSION['account_no'],$amount);
		
		if($transaction_info){
			$msg->success('Deposit successful');
			header('location: /account');
			exit();
		}
   	});


   	// Displays Transfer form
   	$router->get('/transfer/', function() use ($db){
		$accounts = new App\Account($db);
		Dabl\View\View::load('transfer',['accounts'=>$accounts->getAccounts($_SESSION['account_no'])]);
   	});

   	// Processes Transfer form
   	$router->post('/transfer/', function() use ($db,$msg){
		$amount = $_POST['amount'];
		$account = $_POST['account'];

		// check is amount is numeric
		if(!is_numeric() || $amount >= 0){
			$msg->error('Transfer failed, please ensure the amount is correct');
			header('location: /account');
			exit();
		}

		$transaction = new App\Transaction($db);
		$transaction_info = $transaction->transfer($_SESSION['account_no'],$account,$amount);
		
		if($transaction_info){
			$msg->success('Transfer successful');
			header('location: /account');
			exit();
		}else{
			$msg->error('Transfer failed, please ensure the amount is not greater than the account balance');
			header('location: /account');
			exit();
		}
   	});

   	// Displays Transfer form
   	$router->get('/transactions/', function() use ($db){
		$transactions = new App\Transaction($db);
		$transaction_info = $transactions->getTransactions($_SESSION['account_no']);
		Dabl\View\View::load('transaction',['transactions'=>$transaction_info]);
   	});

});