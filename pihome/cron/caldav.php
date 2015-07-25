<?php
/*
 * PiHome v2.0
 * http://pihome.harkemedia.de/
 *
 * PiHome Copyright (c) 2015, Sebastian Harke
 * Lizenz Informationen.
 *
 * This work is licensed under the Creative Commons Namensnennung - Nicht-kommerziell - Weitergabe unter gleichen Bedingungen 3.0 Unported License. To view a copy of this license,
 * visit: http://creativecommons.org/licenses/by-nc-sa/3.0/.
 *
*/

require_once '/home/www/config/dbconfig.inc.php';
require_once '/home/www/cron/functions.inc.php';
require_once '/home/www/cron/CalDAVClient.php';

// Load Settings Data
$settings = settings();
date_default_timezone_set($settings['timezone']);  

if($settings['oc_ical']==true)
{    
    
    $url = parse_url($settings['oc_ical_url']);
    if($url['scheme']=="https"){ $port = "443"; }else{ $port = "80"; }
    $acc["davical"] = array(
        "user" => $settings['oc_user'],
        "pass" => $settings['oc_pass'],
        "server" => $url['host'],
        "port" => $port,
        "uri" => $settings['oc_ical_url']
    );
    $account = $acc["davical"];    
    $cal = new CalDAVClient( $account["uri"], $account["user"], $account["pass"], "", $account["server"], $account["port"] );    
    $events = $cal->GetEvents($sta, $end);    
    foreach($events AS $k => $event) 
    {                          
        $ce = explode("VEVENT", $event['data']);            
        $su = explode("SUMMARY:", $ce[1]);
        $su1 = explode("\n", $su[1]);                    
        preg_match("/DTSTART;(.*):(.*)/", $ce[1], $treffer);                    
        $sta = strtotime($treffer[2]);            
        $end = strtotime($treffer[2])+(60*1);        
        $now = time();        
        if(( $now >= $sta && $now <= $end ))
        {            
            $su2 = explode("_", trim($su1[0]));
            $lampID = trim($su2[0]); 
            $action = trim($su2[1]);
            $stat = checkLightStatus($lampID);
            $co = getCodeById($lampID);        
            $code = $co["code"];
            if($co['letter']=="A"){ $letter = "1";
            }elseif($co['letter']=="B"){ $letter = "2";
            }elseif($co['letter']=="C"){ $letter = "3";
            }elseif($co['letter']=="D"){ $letter = "4"; 
            }elseif($co['letter']=="E"){ $letter = "5"; }
            if($action=="on" AND $stat=="0")
            {                                
                shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$letter.' 1 ');
                setLightStatus($lampID,$action);

            }elseif($action=="off" AND $stat=="1")
            {                                
                shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$letter.' 0 ');
                setLightStatus($lampID,$action);
            }            
        }          
        
    }
    
}

?>