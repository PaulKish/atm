<?php
/**
 * Auth Class 
 * 
 * Allows login, logout
 */

namespace App;
use Medoo\Medoo;

class Auth{
	public $db;

	public function __construct(Medoo $db){
        $this->db = $db; // pass Medoo object
    }

    /**
     * Login
     */ 
    public function login($account_no,$pin){
    	// check if account exists
    	$account = new Account($this->db);
    	$account_info = $account->getAccount($account_no);

    	if(password_verify($pin, $account_info['pin'])){
    		$_SESSION['logged_in'] = true;
            $_SESSION['account_no'] = $account_no;
    		return true;
    	}else{
    		return false;
    	}
    } 
}