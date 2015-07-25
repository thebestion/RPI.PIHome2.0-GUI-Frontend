<?php
class View {

  private $_login;
  private $_cconfig;
  private $_vars = array();

  public function __construct() {
    require_once 'library/Login.php'; 
    $this->_login = new Login(); 
    require_once 'config/controller.inc.php';
    $this->_cconfig = new ControllerConfig();    
  }

  public function __set($key, $value) {
    $this->_vars[$key] = $value;
  }

  public function render($tpl) 
  {      
  	$cc = $this->_cconfig->read(); 	
    extract($this->_vars);
    ob_start();     
    if($this->_login->is_login()==true or $cc['login']==false){          
        require_once 'models/homeModel.php';
        $intern   = new homeModel();
        $rooms    = $intern->getAllRooms();
        $weather  = $intern->getWeather();        
        $settings = $intern->settings();
        $userdata = $intern->getUser($_SESSION[user_id]);
    	include 'views/intern/header.tpl.php';
	    include 'views/'.$tpl;
    	include 'views/intern/footer.tpl.php';
    }else{
    	include 'views/extern/header.tpl.php';
	    include 'views/'.$tpl;
    	include 'views/extern/footer.tpl.php';
    }    
    return ob_get_clean();
  }

  public function display($tpl) {
    echo $this->render($tpl);
  }
}