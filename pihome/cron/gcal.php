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
#error_reporting(0);
require_once '/home/www/config/dbconfig.inc.php';
require_once '/home/www/cron/functions.inc.php';

// Load Settings Data
$settings = settings();
date_default_timezone_set($settings['timezone']);  

if($settings['gcal_ical_activ']==true){

    // Google Kalender Secret Url im iCal-Format (.ics)
    $gurl = $settings['gcal_ical'];
    $ical = file_get_contents($gurl);
    $events = explode("BEGIN:VEVENT", $ical);
    $status = "";

    foreach($events as $event){

        $sum = strpos($event, "SUMMARY");
        $dts = strpos($event, "DTSTART");
        $dte = strpos($event, "DTEND");

        if($sum == true AND $dts == true AND $dte == true){

            $su = explode("SUMMARY:", $event);
            $su1 = explode("\n", $su[1]);        
            $ts = explode("DTSTART:", $event);
            $ts1 = explode("\n", $ts[1]);        
            $te = explode("DTEND:", $event);
            $te1 = explode("\n", $te[1]);        
            $now = time();

            if($now >= strtotime($ts1[0]) AND $now <= strtotime($te1[0])){

                $su2 = explode("_", trim($su1[0]));
                $lampID = trim($su2[0]); 
                $action = trim($su2[1]);
                $stat = checkLightStatus($lampID);
                $co = getCodeById($lampID);        
                $code = $co["code"];

                if($co['letter']=="A"){ $letter = "1";
                }elseif($co['letter']=="B"){ $letter = "2";
                }elseif($co['letter']=="C"){ $letter = "3";
                }elseif($co['letter']=="D"){ $letter = "4"; }

                if($action=="on" AND $stat=="0")
                {            
                    #echo "AN ".$action." - ".date("d.m.Y - H:i:s")."\n";
                    shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$letter.' 1 ');
                    setLightStatus($lampID,$action);

                }elseif($action=="off" AND $stat=="1")
                {            
                    #echo "AUS ".$action." - ".date("d.m.Y - H:i:s")."\n";
                    shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$letter.' 0 ');
                    setLightStatus($lampID,$action);

                }

            }

        }
    }
    
}

?>