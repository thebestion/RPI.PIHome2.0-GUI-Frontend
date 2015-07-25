<?php
class homeModel 
{
  
  private $_con;
  
    
  public function __construct() 
  {   
		require_once 'library/Database.php';
        $this->_con = new Database();
        $this->_con = $this->_con->con();
  }

  
  public function getActivDevices()
  {      
        foreach($this->_con->query('SELECT * from '.PREFIX.'devices WHERE aktiv = "1" ORDER BY sort ') as $row) { $devices[] = $row; }      
        return $devices; 
  }
    
    
  public function getAllDevices()
  {
        foreach($this->_con->query('SELECT * from '.PREFIX.'devices ') as $row) { $devices[] = $row; }      
        return $devices; 
  }
    
    
  public function getDeviceById($deviceid) 
  {
        $pro = $this->_con->query("SELECT * FROM ".PREFIX."devices WHERE id = '".$deviceid."' LIMIT 1 ")->fetch(PDO::FETCH_ASSOC);  
        return $pro;
  }
    
    
  public function getDeviceOn() 
  {
        foreach($this->_con->query('SELECT * from '.PREFIX.'devices WHERE status = "1" ') as $row) { $lighton[] = $row; }       	
        return $lighton;
  }
    
    
  public function getWeather() 
  {    
        $file = SERVER_PATH."weather/weather.json";
        if(file_exists($file))
        {
            $json = file_get_contents($file);            
            $weather_data = json_decode($json, true);
            $arr['temp_kelvin']  = $weather_data['main']['temp'];
            $arr['wind_mps']     = $weather_data['wind']['speed'];
            $arr['temp_celsius'] = round($weather_data['main']['temp']-272.15); 
            $arr['wind_kms']     = round($weather_data['wind']['speed']*1.609344, 2);
            $arr['sunrise']      = $weather_data['sys']['sunrise'];
            $arr['sunset']       = $weather_data['sys']['sunset'];
            $arr['weather_code'] = $weather_data['weather'][0]['id'];
            $arr['title']        = $weather_data['weather'][0]['main'];
            $arr['description']  = $weather_data['weather'][0]['description'];
            $arr['icon']         = $weather_data['weather'][0]['icon'];
            $arr['location']     = $weather_data['name'];
            $arr['lon']          = $weather_data['coord']['lon'];
            $arr['lat']          = $weather_data['coord']['lat'];
            return $arr;
        }else{
            return 0;
        }
  }
    
    
  public function settings() 
  {      
        foreach($this->_con->query('SELECT * from '.PREFIX.'settings ') as $row) { $settings[$row['name']] = $row['value']; }       	
        return $settings;          
  }
   
    
  public function getAllRooms()
  {  
        foreach($this->_con->query('SELECT * from '.PREFIX.'rooms ') as $row) { $rooms[] = $row; }      
        return $rooms; 
  }
    
  
  public function getRoomNameById($roomid) 
  {   
        $pro = $this->_con->query("SELECT * FROM ".PREFIX."rooms WHERE id = '".$roomid."' LIMIT 1 ")->fetch(PDO::FETCH_ASSOC);  
        return $pro['room'];
  }
    
   
  public function getLampsByRoomId($roomid)
  {      
        foreach($this->_con->query('SELECT * from '.PREFIX.'devices WHERE room_id = "'.$roomid.'" AND aktiv = "1" ') as $row) { $devices2[] = $row; }      
        return $devices2; 
  }
   

  public function setDeviceStatus($deviceid, $status)
  {            
        $sql = "UPDATE ".PREFIX."devices SET status = :deviceStatus WHERE id = :deviceID ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':deviceStatus', $status, PDO::PARAM_STR);
        $stmt->bindParam(':deviceID', $deviceid, PDO::PARAM_INT);   
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }        
  }
    
    
  public function setDeviceStatusByCode($l, $c, $s)
  {            
        $sql = "UPDATE ".PREFIX."devices SET status = :cstatus WHERE letter = :cletter AND code = :ccode ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':cstatus',     $s, PDO::PARAM_STR);
        $stmt->bindParam(':cletter',     $l, PDO::PARAM_STR);  
        $stmt->bindParam(':ccode',       $c, PDO::PARAM_STR);  
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }        
  }
    
    
  public function getAllUsers()
  {      
        foreach($this->_con->query('SELECT * from '.PREFIX.'admin ') as $row) { $user[] = $row; }      
        return $user; 
  }
    
  
  public function getUser($userid) 
  {         
        $pro = $this->_con->query("SELECT * FROM ".PREFIX."admin WHERE id = '".$userid."' LIMIT 1 ")->fetch(PDO::FETCH_ASSOC);  
        return $pro;
  }
    

  public function timezone()
  {
        $regions = array(
            'Africa' => DateTimeZone::AFRICA,
            'America' => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Aisa' => DateTimeZone::ASIA,
            'Atlantic' => DateTimeZone::ATLANTIC,
            'Europe' => DateTimeZone::EUROPE,
            'Indian' => DateTimeZone::INDIAN,
            'Pacific' => DateTimeZone::PACIFIC
        );
        $timezones = array();
        foreach ($regions as $name => $mask)
        {
            $zones = DateTimeZone::listIdentifiers($mask);
            foreach($zones as $timezone)
            {
                $time = new DateTime(NULL, new DateTimeZone($timezone));
                $ampm = $time->format('H') > 12 ? ' ('. $time->format('g:i a'). ')' : '';
                $timezones[$name][$timezone] = substr($timezone, strlen($name) + 1) . ' - ' . $time->format('H:i') . $ampm;
            }
        }
        return $timezones;
  }    
    
    
  public function saveDevice($arr)
  {  
      $code = $arr['c1'].$arr['c2'].$arr['c3'].$arr['c4'].$arr['c5'];
      $sql = "INSERT INTO ".PREFIX."devices (             
             room_id,
             device,
             letter,
             code,             
             sort,             
             aktiv) VALUES (
            :droom_id, 
            :ddevice,
            :dletter,
            :dcode,             
            :dsort,            
            :daktiv)";
        $stmt = $this->_con->prepare($sql);                                  
        $stmt->bindParam(':droom_id',    $arr['room_id'], PDO::PARAM_STR);       
        $stmt->bindParam(':ddevice',     $arr['device_name'], PDO::PARAM_STR); 
        $stmt->bindParam(':dletter',     $arr['letter'], PDO::PARAM_STR); 
        $stmt->bindParam(':dcode',       $code, PDO::PARAM_STR);               
        $stmt->bindParam(':dsort',       $arr['sort'], PDO::PARAM_STR); 
        $stmt->bindParam(':daktiv',      $arr['aktiv'], PDO::PARAM_STR); 
        $stmt->execute();  
        $newId = $this->_con->lastInsertId();
        return $newId;         
  }
    
    
  public function updateDevice($arr)
  {     
        $code = $arr['c1'].$arr['c2'].$arr['c3'].$arr['c4'].$arr['c5'];
        $sql = "UPDATE ".PREFIX."devices SET 
                room_id = :croom,
                device = :cdevice,
                letter = :cletter,
                code = :ccode,
                sort = :csort
                WHERE id = :deviceID ";        
        $stmt = $this->_con->prepare($sql);
        $stmt->bindParam(':croom',      $arr['room'], PDO::PARAM_STR); 
        $stmt->bindParam(':cdevice',    $arr['device_name'], PDO::PARAM_STR); 
        $stmt->bindParam(':cletter',    $arr['letter'], PDO::PARAM_STR); 
        $stmt->bindParam(':ccode',      $code, PDO::PARAM_STR); 
        $stmt->bindParam(':csort',      $arr['sort'], PDO::PARAM_STR); 
        $stmt->bindParam(':deviceID',   $arr['deviceid'], PDO::PARAM_INT);          
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }
    
    
  public function delDevice($deviceid)
  {         
        $sql = "DELETE FROM ".PREFIX."devices WHERE id = :deviceID";
        $stmt = $this->_con->prepare($sql);
        $stmt->bindParam(':deviceID', $deviceid, PDO::PARAM_INT);          
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }
    
   
  public function updateDeviceSunset($deviceid, $sunset)
  {            
        $sql = "UPDATE ".PREFIX."devices SET sunset = :devicesunset WHERE id = :deviceID ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':devicesunset', $sunset, PDO::PARAM_STR);
        $stmt->bindParam(':deviceID', $deviceid, PDO::PARAM_INT);   
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }        
  }
    
    
  public function updateDeviceAktiv($deviceid, $aktiv)
  { 
        $sql = "UPDATE ".PREFIX."devices SET aktiv = :deviceaktiv WHERE id = :deviceID ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':deviceaktiv', $aktiv, PDO::PARAM_STR);
        $stmt->bindParam(':deviceID', $deviceid, PDO::PARAM_INT);   
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }

   
  public function insertRoom($arr)
  {                     
        $sql = "INSERT INTO ".PREFIX."rooms ( room ) VALUES ( :rroom )";
        $stmt = $this->_con->prepare($sql);                                  
        $stmt->bindParam(':rroom',    $arr['room_name'], PDO::PARAM_STR);        
        $stmt->execute();  
        $newId = $this->_con->lastInsertId();
        return $newId; 
  }  
    
    
  public function updateRoom($arr)
  {         
        $sql = "UPDATE ".PREFIX."rooms SET room = :rroom WHERE id = :roomID ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':rroom', $arr['room_name'], PDO::PARAM_STR);
        $stmt->bindParam(':roomID', $arr['roomid'], PDO::PARAM_INT);   
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        } 
  }  
    
    
  public function delRoom($roomid)
  { 
        $sql = "DELETE FROM ".PREFIX."rooms WHERE id = :roomID";
        $stmt = $this->_con->prepare($sql);
        $stmt->bindParam(':roomID', $roomid, PDO::PARAM_INT);          
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }

   
  public function insertUser($arr)
  { 
        $sql = "INSERT INTO ".PREFIX."admin (             
             user,
             pass,
             name,
             admin,
             color,
             apikey) VALUES (
            :cuser,
            :cpass,
            :cname,
            :cadmin,
            :ccolor,
            :capikey)";
        $stmt = $this->_con->prepare($sql);                                  
        $stmt->bindParam(':cuser',      $arr['user_name'], PDO::PARAM_STR); 
        $stmt->bindParam(':cpass',      $arr['pass'], PDO::PARAM_STR); 
        $stmt->bindParam(':cname',      $arr['name'], PDO::PARAM_STR); 
        $stmt->bindParam(':cadmin',     $arr['admin'], PDO::PARAM_STR); 
        $stmt->bindParam(':ccolor',     $arr['color'], PDO::PARAM_STR);              
        $stmt->bindParam(':capikey',    $arr['apikey'], PDO::PARAM_STR);              
        $stmt->execute();  
        $newId = $this->_con->lastInsertId();
        return $newId;  
  }  
    
    
  public function updateUser($arr)
  {                 
        $sql = "UPDATE ".PREFIX."admin SET 
                user = :cuser,
                name = :cname,
                admin = :cadmin,
                color = :ccolor
                WHERE id = :userID ";        
        $stmt = $this->_con->prepare($sql);
        $stmt->bindParam(':cuser',      $arr['user_name'], PDO::PARAM_STR); 
        $stmt->bindParam(':cname',      $arr['name'], PDO::PARAM_STR); 
        $stmt->bindParam(':cadmin',     $arr['admin'], PDO::PARAM_STR); 
        $stmt->bindParam(':ccolor',     $arr['color'], PDO::PARAM_STR);         
        $stmt->bindParam(':userID',     $arr['edituserid'], PDO::PARAM_INT);          
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }  
    
    
  public function delUser($userid)
  { 
        $sql = "DELETE FROM ".PREFIX."admin WHERE id = :userID";
        $stmt = $this->_con->prepare($sql);
        $stmt->bindParam(':userID', $userid, PDO::PARAM_INT);          
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }  
    
    
  public function updateSettings($data)      
  {           
        unset($data['send']);
        foreach($data as $key => $value){            
            $sql = "UPDATE ".PREFIX."settings SET value = :value WHERE name = :key ";        
            $stmt = $this->_con->prepare($sql);                                           
            $stmt->bindParam(':value', $value, PDO::PARAM_STR);
            $stmt->bindParam(':key', $key, PDO::PARAM_INT);   
            $stmt->execute();
        }        
  }  
    
    
  public function updatePassword($userid,$pass)
  { 
        # [send] => save [pw] => pihome [newpw1] => pihome2 [newpw2] => pihome2 
        $sql = "UPDATE ".PREFIX."admin SET pass = :userpass WHERE id = :userID ";        
        $stmt = $this->_con->prepare($sql);                                           
        $stmt->bindParam(':userpass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':userID', $userid, PDO::PARAM_INT);   
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }
  }

  public function checkApiKey($key)
  {
        $nRows = $this->_con->query('SELECT count(*) from '.PREFIX.'admin WHERE apikey = "'.$key.'" ')->fetchColumn(); 
        return $nRows; 
  }
    
  public function makeApiKey($lenght)
  {  
        mt_srand((double)microtime()*1000000);
        $charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $length  = strlen($charset)-1;
        $code    = '';
        for($i=0;$i<$lenght;$i++) { $code .= $charset{mt_rand(0, $length)}; }
        return $code;
  }


}