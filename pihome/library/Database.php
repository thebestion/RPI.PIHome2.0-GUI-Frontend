<?php
/*
 * PiHome v2.0
 * http://pihome.harkemedia.de/
 *
 * PiHome Copyright (c) 2015, Sebastian Harke
 * Lizenz Informationen.
 *
 * This work is licensed under the Creative Commons Namensnennung - Nicht-kommerziell - 
 * Weitergabe unter gleichen Bedingungen 3.0 Unported License. To view a copy of this license,
 * visit: http://creativecommons.org/licenses/by-nc-sa/3.0/.
 *
*/

class Database {

    private $_con;
    
    public function __construct() {
    	return $this->con();
  	}

    function con()
	{
	    $this->_con = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);  
	    $this->_con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	    $this->_con->exec("SET CHARACTER SET ".DB_CHARSET);  //  return all sql requests as UTF-8  
		return $this->_con;
	}
    
}


