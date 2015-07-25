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

/* MySql Daten */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'pihome');
define('DB_CHARSET', 'utf8');
define('PREFIX', 'pi_');

define('LANGUAGE', 'en');
define('BASE', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('SERVER_PATH', '/home/www/');

function name($name)
{
    $n = explode(" ", $name);
    if(count($n)==0)
    {
        $r = $name[0].$name[1];
    }else{
        $r = $n[0][0].$n[1][0];
    }
    return strtoupper($r);
}