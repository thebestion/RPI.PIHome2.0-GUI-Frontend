<?php

class apiController 
{

  private $_model;   

  public function __construct() 
  {
    require_once 'models/homeModel.php'; 
    $this->_model = new homeModel();  
  }

    
  public function indexAction() 
  {    
        if(($_GET['ak']!="" && $this->_model->checkApiKey($_GET['ak'])!="0" && $_GET['ch']!="" && $_GET['co']!="" && $_GET['s']!=""))  
        {
            $char = $this->letter($_GET['ch']);
            $code = $_GET['co'];
            $status = $_GET['s'];
            // execute rcswitch-pi
            shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$char.' '.$status.' ');
            // Set device status            
            $setlamp = $this->_model->setDeviceStatusByCode($_GET['ch'], $code, $status);            
            echo $setlamp;       
        }    
  }
    
    
    
  public function alloffAction() 
  {    
        if(($_GET['ak']!="" && $this->_model->checkApiKey($_GET['ak'])!="0"))  
        {            
            // All Off            
            $lights = $this->_model->getDeviceOn();
            foreach($lights as $light){
                $stat = "0";    
                $letter = $this->letter($light['letter']);            
                // execute rcswitch-pi
                shell_exec('sudo /home/div/rcswitch-pi/send '.$light['code'].' '.$letter.' '.$stat.' ');      
                // Set device status
                $this->_model->setDeviceStatus($light['id'],$stat);
            }
            echo 1;      
        }    
  }
    
    
  private function letter($code)
  {
        if($code=="A"){
                $letter = "1";
        }elseif($code=="B"){
                $letter = "2";
        }elseif($code=="C"){
                $letter = "3";
        }elseif($code=="D"){
                $letter = "4";
        }elseif($code=="E"){
                $letter = "5";
        }
        return $letter;
  }
    
  
}