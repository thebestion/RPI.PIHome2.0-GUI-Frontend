<?
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


function dbconnect()
{
    global $config;
	if (!($link = mysql_connect(DB_HOST, DB_USER, DB_PASS)))
	{
        print "<h3>could not connect to database</h3>\n";
		exit;
	}
	mysql_select_db(DB_NAME);
    return $link;
}



function getLights()
{
	dbconnect();
	$sql_getLights       = "SELECT * FROM  ".PREFIX."devices  WHERE aktiv = '1' ORDER BY sort DESC ";
	$query_getLights     = mysql_query($sql_getLights);	
	$x=0;
	while($light = mysql_fetch_assoc($query_getLights)){
		$devices[$x]["id"] = $light['id'];
		$devices[$x]["room_id"] = $light['room_id'];
		$devices[$x]["device"] = $light['device'];
		$devices[$x]["letter"] = $light['letter'];
		$devices[$x]["code"] = $light['code'];
		$devices[$x]["status"] = $light['status'];
		$x=$x+1;
	}
	return $devices;
}


function getRoomById($id)
{
    dbconnect();
    $sql_getroom       = "SELECT * FROM ".PREFIX."rooms  WHERE id = '".$id."' ";
    $query_getroom      = mysql_query($sql_getroom);
    while($getroom  = mysql_fetch_assoc($query_getroom)){
        return $getroom['room'];
    }
}



function setLightStatus($id,$status)
{	    
	if($status=="on"){ $s="1"; }elseif($status=="off"){ $s="0"; }	    
	dbconnect();    
    $sql = "UPDATE `".PREFIX."devices` SET `status`='".$s."' WHERE `id`='".$id."'";
	mysql_query($sql);	
}



function getCodeById($id)
{
	dbconnect();
	$sql_getcode       = "SELECT * FROM  ".PREFIX."devices  WHERE id = '".$id."' ";
	$query_getcode      = mysql_query($sql_getcode);
	while($code  = mysql_fetch_assoc($query_getcode)){
		$c["letter"] = $code['letter'];
		$c["code"] = $code['code'];
	}
	return $c;
}



function allOff()
{
	dbconnect();
	$sql_alloff = "SELECT * FROM ".PREFIX."devices WHERE status = 1 ";
	$query_alloff = mysql_query($sql_alloff);
	while($getallon = mysql_fetch_assoc($query_alloff))
    {			
        $stat = "off";
        setLightStatus($getallon["id"], $stat);
        if($getallon['letter']=="A"){
            $letter = "1";
        }elseif($getallon['letter']=="B"){
            $letter = "2";
        }elseif($getallon['letter']=="C"){
            $letter = "3";
        }elseif($getallon['letter']=="D"){
            $letter = "4";
        }elseif($getallon['letter']=="E"){
            $letter = "5";
        }        
        $status = "0";
        $co = $getallon['code'];        
        shell_exec('sudo /home/div/rcswitch-pi/send '.$co.' '.$letter.' '.$status.' ');        
	}	
}


function checkLightStatus($id)
{    
	dbconnect();
	$sql_light       = "SELECT * FROM  ".PREFIX."devices  WHERE id = '".$id."' ";
	$query_light      = mysql_query($sql_light);
	while($light  = mysql_fetch_assoc($query_light))
    {
	   $ls = $light['status'];
	}
	return $ls;
}


function settings()
{
    dbconnect();
	$sql_settings = "SELECT * FROM ".PREFIX."settings ";
	$query_settings = mysql_query($sql_settings);		
	while($items = mysql_fetch_assoc($query_settings)){
		$settings[$items['name']] = $items['value'];		
	}
	return $settings;
}


function getSunSet()
{
    dbconnect();
	$sql_ss = "SELECT * FROM ".PREFIX."devices WHERE status = '0' AND sunset = '1' ";
	$query_ss = mysql_query($sql_ss);		
	while($items = mysql_fetch_assoc($query_ss)){
		$sunset[] = $items['id'];		
	}
	return $sunset;
}



?>
