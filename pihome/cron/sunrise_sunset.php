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
// Set timezone
error_reporting(0);
require_once '/home/www/config/dbconfig.inc.php';
require_once '/home/www/cron/functions.inc.php';

// Load Settings Data
$settings = settings();
date_default_timezone_set($settings['timezone']); 
$city = $settings['city'];
$country = $settings['country_code'];

// Geo
$gmapsurl = "http://maps.googleapis.com/maps/api/geocode/json?address=".trim($city).",".$country."&sensor=true";
$json = file_get_contents($gmapsurl);
$array = json_decode($json, true);
$data = array();
$data['lat'] = $array['results'][0]['geometry']['location']['lat'];
$data['lng'] = $array['results'][0]['geometry']['location']['lng'];
$data['status'] = $array['status'];

$now = time(); 
$gmt_offset = 1; 
$zenith = 50/60; 
$zenith = $zenith + 90; 
$sunset = date_sunset($now, SUNFUNCS_RET_TIMESTAMP, $data['lat'], $data['lng'], $zenith, $gmt_offset); 
$sunrise= date_sunrise($now, SUNFUNCS_RET_TIMESTAMP, $data['lat'], $data['lng'], $zenith, $gmt_offset); 
$ssfd = $sunset+(60*1);
$srfd = $sunrise+(60*1);

#echo date('d.m.Y - H:i:s',$sunset);
#echo "<br>";
#echo date('d.m.Y - H:i:s',$sunrise);

// Sunset
if($now >= $sunset AND $now <= $ssfd)
{
    
    // Lampen IDs aus DB holen bei denen sunset gesetzt ist
    $lamps = getSunSet();
    foreach($lamps as $lampID)
    {        
        $stat = checkLightStatus($lampID);
        if($stat=="0")
        {     
            $co = getCodeById($lampID);        
            $code = $co["code"];
            $status = "1";
            if($co['letter']=="A"){ $letter = "1";
            }elseif($co['letter']=="B"){ $letter = "2";
            }elseif($co['letter']=="C"){ $letter = "3";
            }elseif($co['letter']=="D"){ $letter = "4"; }
            shell_exec('sudo /home/div/rcswitch-pi/send '.$code.' '.$letter.' '.$status.' ');
            setLightStatus($lampID,"on");
        } 
    }
}


// Sunrise
if($settings['sunrise']==true){

    if($now >= $sunrise AND $now <= $srfd)
    {
        // ALL OFF - Alle lampen die an sind
        allOff();        
    }
}


?>