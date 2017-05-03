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
    	$withdraw_id = $this->withdraw($account_no,$amount);

	   	// deposit in another account
	   	$deposit_id = $this->deposit($receiving_account,$amount);
    }

    /**
     * Account Balance
     */ 
	public function getBalance($account_no){
		$withdraws = $this->db->sum('transaction', 'amount',[
			'transaction_type'=>1 // withdraws
		]);

		$deposits = $this->db->sum('transaction', 'amount',[
			'transaction_type'=>2 // deposits
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