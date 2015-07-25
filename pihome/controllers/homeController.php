<?php
class homeController 
{

  private $_view;

  public function __construct() 
  {
    require_once 'library/View.php';
    $this->_view = new View();    
  }


  public function indexAction() 
  {
    
    require_once 'models/homeModel.php';    
    $this->_view->title = TITEL_HOME;    
    $this->_view->display('home/index.tpl.php');
  }  
    
    
  public function roomAction()
  {
    require_once 'models/homeModel.php';
    $model = new homeModel();
    $room_name = $model->getRoomNameById($_GET['id']);      
    $lampsByRoomId = $model->getLampsByRoomId($_GET['id']);         
    $this->_view->title = $room_name.TITEL_ROOM;          
    $this->_view->room_name = $room_name;
    $this->_view->lampen = $lampsByRoomId;
    $this->_view->display('room/index.tpl.php');
  }
    
    
  public function lampsAction()
  {
    require_once 'models/homeModel.php';
    $model = new homeModel();    
    $this->_view->title = TITEL_LAMPS; 
      
    if($_POST['send']=="adddevice"){ 
        $newDevice = $model->saveDevice($_POST);        
    }
      
    if($_POST['send']=="editdevice"){ 
        $editDevice = $model->updateDevice($_POST);         
    }    
      
    $lights = $model->getAllDevices();          
    foreach($lights as $lamp)
    {
        $arr['id'] = $lamp['id'];
        $arr['room_id'] = $lamp['room_id'];
        $arr['device'] = $lamp['device'];
        $arr['status'] = $lamp['status'];
        $arr['sunset'] = $lamp['sunset'];  
        $arr['letter']  = $lamp['letter'];
        $arr['code']    = $lamp['code'];
        $arr['sort']    = $lamp['sort'];
        $arr['aktiv']    = $lamp['aktiv'];
        $arr['room'] = $model->getRoomNameById($lamp['room_id']);         
        $array[] = $arr;         
    }   
    $this->_view->lampen = $array;  
    $rooms = $model->getAllRooms();
    $this->_view->rooms = $rooms;
    $this->_view->display('lamps/index.tpl.php');
  }
    
    
  public function roomsAction()
  {
    require_once 'models/homeModel.php';
    $model = new homeModel();
        
    if($_POST['send']=="addroom"){ 
        $newRoom = $model->insertRoom($_POST);        
    }
      
    if($_POST['send']=="editroom"){ 
        $editRoom = $model->updateRoom($_POST);        
    }
      
    $rooms = $model->getAllRooms();
    $this->_view->title = TITEL_ROOMS;    
    $this->_view->rooms = $rooms;
    $this->_view->display('rooms/index.tpl.php');
  }
    
  public function userAction()
  {
    require_once 'models/homeModel.php';
    $model = new homeModel(); 
    if($_POST['send']=="adduser"){            
        # make password
        $_POST['pass'] = $model->makeApiKey("7");        
        # make apikey
        $_POST['apikey'] = $model->makeApiKey("32");  
        # add user in db        
        $newUser = $model->insertUser($_POST);
    }
      
    if($_POST['send']=="edituser"){
        $editUser = $model->updateUser($_POST);
    }
      
      
    $users = $model->getAllUsers();
    $this->_view->title = TITEL_USER;
    $this->_view->users = $users;
    $this->_view->display('user/index.tpl.php');
  }
    
    
  public function settingsAction()
  {
    require_once 'library/Country.php';
    require_once 'models/homeModel.php';             
    $model = new homeModel();
    if($_POST['send']=="save"){ $model->updateSettings($_POST); }   
    $room_name = $model->getRoomNameById($_GET['id']);      
    $lampsByRoomId = $model->getLampsByRoomId($_GET['id']);      
    $timezones = $model->timezone();      
    $this->_view->title = TITEL_SETTINGS;                 
    $this->_view->room_name = $room_name;
    $this->_view->lampen = $lampsByRoomId;
    $this->_view->timezones = $timezones;
    $this->_view->countries = $countries;
    $this->_view->display('settings/index.tpl.php');
  }
    
    
  public function pwchangeAction()
  {
    require_once 'models/homeModel.php';
    $model = new homeModel(); 
    $user = $model->getUser($_SESSION[user_id]);
    $err = "";
    $msg = "";
    if($_POST['send']=="save")
    {        
        if ($_POST['pw'] === $user['pass'])
        {
            if ($_POST['newpw1'] === $_POST['newpw2'])
            {
                $model->updatePassword($_SESSION[user_id], $_POST['newpw1']);   
                $msg = "Passwort wurde geändert!";    
            }else{
                $err = "Passwörter nicht identisch!";    
            }
        }else{
            $err = "Passwort nicht korrekt!";
        }
    }
    $this->_view->err = $err;   
    $this->_view->msg = $msg;  
    $this->_view->title = TITEL_CHPW;      
    $this->_view->display('pwchange/index.tpl.php');
  }
  
        
  public function  getlightsAction() 
  {    
    require_once 'models/homeModel.php';
    $model = new homeModel();
    $lights = $model->getActivDevices();    
    foreach($lights as $lamp)
    {
        $arr['id'] = $lamp['id'];
        $arr['room_id'] = $lamp['room_id'];
        $arr['device']  = $lamp['device'];
        $arr['status']  = $lamp['status'];
        $arr['sunset']  = $lamp['sunset'];        
        $room = $model->getRoomNameById($lamp['room_id']); 
        $arr['room'] = $room;        
        $array[] = $arr;         
    }    
    echo json_encode($array);    
  }  
    
    
  public function setAction()
  {
    if($_GET['id']!=""){
        $str = explode("_", $_GET['id']);   
        $lampid = $str[0];
        require_once 'models/homeModel.php';
        $model = new homeModel();
        // get device data
        $device = $model->getDeviceById($lampid);
        if($str[1]=="on"){ $lampset="1"; }elseif($str[1]=="off"){ $lampset="0"; }        
        $letter = $this->letter($device['letter']);        
        $co = $device['code'];
        // execute rcswitch-pi
        shell_exec('sudo /home/div/rcswitch-pi/send '.$co.' '.$letter.' '.$lampset.' ');
        // Set device status
        $setlamp = $model->setDeviceStatus($lampid,$lampset);
        echo $setlamp;        
    }
  }
    
    
  public function alloffAction()
  {    
        require_once 'models/homeModel.php';
        $model = new homeModel();
        $lights = $model->getDeviceOn();        
        foreach($lights as $light){
            $stat = "0";    
            $letter = $this->letter($light['letter']);            
            // execute rcswitch-pi
            shell_exec('sudo /home/div/rcswitch-pi/send '.$light['code'].' '.$letter.' '.$stat.' ');      
            // Set device status
            $model->setDeviceStatus($light['id'],$stat);
        }
        echo 1;      
  }

    
  public function deldeviceAction()
  { 
        if($_GET['id']!=""){
            require_once 'models/homeModel.php';
            $model = new homeModel();
            echo $model->delDevice($_GET['id']);
        }
  }
    
    
  public function updatesunsetAction()
  {         
        if($_GET['id']!=""){
            require_once 'models/homeModel.php';
            $model = new homeModel();
            echo $model->updateDeviceSunset($_GET['id'], $_GET['set']);
        }
  }  
    
    
  public function updateaktivAction()
  { 
        if($_GET['id']!=""){
            require_once 'models/homeModel.php';
            $model = new homeModel();
            echo $model->updateDeviceAktiv($_GET['id'], $_GET['set']);
        }
  }

    
    
  public function delroomAction()
  { 
        if($_GET['id']!=""){
            require_once 'models/homeModel.php';
            $model = new homeModel();
            echo $model->delRoom($_GET['id']);
        }
  }

    
  public function deluserAction()
  { 
        if($_GET['id']!=""){
            require_once 'models/homeModel.php';
            $model = new homeModel();
            echo $model->delUser($_GET['id']);
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