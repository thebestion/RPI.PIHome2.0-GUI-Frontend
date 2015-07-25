<?php

class Controller {

  private $ctrlr;
  private $_login;
  private $_cconfig;
    
  
  public function __construct() 
  {
    require 'library/Login.php';    
    $this->_login = new Login();
    require 'config/controller.inc.php';
    $this->_cconfig = new ControllerConfig();       
  }

  public function run() 
  {
    try 
    {          
      $controller = $this->_getController();
      $action = $this->_getAction();
      $c_file = 'controllers/'.$controller.'.php';      
      $cc = $this->_cconfig->read();
            
      if($this->_login->is_login()==true or $cc['login']==false){
		
        // Intern				   
		if(in_array($controller, $cc['intern'])==true or in_array($controller, $cc['both'])==true){			  		
			  if(file_exists($c_file)){
			    require $c_file;			    
			  	call_user_func(array(new $controller, $action));
			  }else{                  
                  $this->_err();                   
              }
		}else{         
            $this->_err();         
        }
		
      }else{	

		// Extern
		if(in_array($controller, $cc['extern'])==true or in_array($controller, $cc['both'])==true){
			  if(file_exists($c_file)){
			    require $c_file;
			  	call_user_func(array(new $controller, $action));
			  }else{                   
                  $this->_err(); 
              }		
		}else{                     
            if($this->_login->is_login()==false && in_array($controller, $cc['intern'])==true){                
                #echo "sdasd";
                $d_controller = $cc['extern_main_controller']."Controller";
                $d_action = "indexAction";
                $d_file = 'controllers/'.$cc['extern_main_controller'].'Controller.php';                
                require $d_file;
                call_user_func(array(new $d_controller, $d_action));
            }else{
                $this->_err(); 
            }                
        }
		
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }    		
  }

  private function _getController() {
    $cc = $this->_cconfig->read();    
  	if($this->_login->is_login()==true  or $cc['login']==false){
	    $controller = isset($_REQUEST['c']) ? strtolower($_REQUEST['c']) : $cc['intern_main_controller'];
	}else{
		$controller = isset($_REQUEST['c']) ? strtolower($_REQUEST['c']) : $cc['extern_main_controller'];
	}
    return $controller.'Controller';
  }
  
  private function _getAction() {
    $action = isset($_REQUEST['a']) ? strtolower($_REQUEST['a']) : 'index';
    return $action.'Action';
  }
  
  private function _err() {
    require 'library/View.php';
	$this->_view = new View();
	$this->_view->title = TITEL_404;
	$this->_view->headline = HEADLINE_404;
	$this->_view->display('404/error.tpl.php');   
  }
  
}
