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

/* Controller Config */

class ControllerConfig {
	
	private $ctrlr;

	 public function __construct() {
	 	
	 	// For Extern-Login set true
		$this->ctrlr['login'] 						= true; // No Login = false / With Login = true
		
		// Set Main-Controller
		$this->ctrlr['intern_main_controller'] 		= "home";
		$this->ctrlr['extern_main_controller'] 		= "login";
		
		// Allow Extern Controller
		$this->ctrlr['extern'] 						= array(
											  		  "loginController"
													);
													
		// Allow Intern Controller
		$this->ctrlr['intern'] 					    = array(
													  "homeController",
                                                      "loginController"
													);	
																
		// Allow Intern and Extern Controller
		$this->ctrlr['both'] 						= array(
                                                        "apiController"
                                                    );	
	}
		
	public function read(){	
		return $this->ctrlr;	
	}
				
}