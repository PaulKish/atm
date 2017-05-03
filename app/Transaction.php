<?php
/**
 * Transaction Class 
 * 
 * Allows withdraw, deposit, balance, get transactions and transfer functionality
 */

namespace App;
use Medoo\Medoo;

class Transaction{
	public $db;

	public function __construct(Medoo $db){
        $this->db = $db; // pass Medoo object
    }

    /**
     *  Withdraw
     */ 
    public function withdraw($account_no,$amount){
    	// check withdrawal amount is not greater than balance
    	if($amount >= $this->getBalance($account_no)){
    		return false;
    	}

	   	$transaction_id = $this->db->insert('transaction', [
	    	'account_no'=>$account_no,
	    	'amount'=>$amount,
	    	'transaction_type'=>1
	    ]);

	    return $transaction_id;
    }

    /**
     *  Deposit
     */ 
    public function deposit($account_no,$amount){
	   	$transaction_id = $this->db->insert('transaction', [
	    	'account_no'=>$account_no,
	    	'amount'=>$amount,
	    	'transaction_type'=>2
	    ]);

	    return $transaction_id;
    }

    /**
     *  Transfer
     */ 
    public function transfer($account_no,$receiving_account,$amount){
	   	// withdraw from account
    	$withdraw = $this->withdraw($account_no,$amount);

    	// if withdraw is successfull then deposit
    	if($withdraw){
    		// deposit in another account
	   		$deposit = $this->deposit($receiving_account,$amount);
	   		return $deposit;
    	}else{
    		return false;
    	}
    }

    /**
     * Account Balance
     */ 
	public function getBalance($account_no){
		$withdraws = $this->db->sum('transaction', 'amount',[
			'transaction_type'=>1, // withdraws
			'account_no' => $account_no
		]);

		$deposits = $this->db->sum('transaction', 'amount',[
			'transaction_type'=>2, // deposits
			'account_no' => $account_no
		]);

		$balance = ($deposits - $withdraws);

		return $balance;
	}

	/**
	 *  Get transactions
	 */
	public function getTransactions($account_no){
		$transactions = $this->db->select("transaction", [
			'account_no',
			'transaction_type',
			'amount',
			'date'
		], [
			'account_no' => $account_no
		]);

		return $transactions;
	} 
}