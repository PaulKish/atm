<?php
/**
 * Account Class 
 * 
 * Gets account info, creates account
 */

namespace App;
use Medoo\Medoo;

class Account{
	public $db;

	public function __construct(Medoo $db){
        $this->db = $db; // pass Medoo object
    }

    /**
     * Get Account info
     */ 
	public function getAccount($account_no){
		$account = $this->db->get('account', ['name','account_no','pin'], [
			'account_no' => $account_no 
		]);

		return $account;
	}

	/**
     * Get Accounts
     */ 
	public function getAccounts($account_no){
		$accounts = $this->db->select('account', ['name','account_no'],[
			"account_no[!]" => $account_no
		]);
		return $accounts;
	}


    /**
     * Creates account
     */ 
	public function createAccount($account_no,$pin,$name){
		$account = $this->db->insert('account', [
	    	'account_no'=>$account_no,
	    	'pin'=> password_hash($pin,PASSWORD_DEFAULT),
	    	'name'=>$name
	    ]);

	    return $account;
	}
}