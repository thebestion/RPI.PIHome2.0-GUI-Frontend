<?php

class Login{	
    
	public function __construct() {        
		return $this->is_login();
	}
	
	public function is_login(){        
        if((isset($_SESSION[user_key]) && $_SESSION[user_key] == md5($_SESSION[user_id].session_id().sesseion_secret_key))){	
			return true;
		}else{
			return false;
		}
	}

}