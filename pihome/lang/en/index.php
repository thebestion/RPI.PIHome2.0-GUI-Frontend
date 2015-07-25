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
/* general */
define('LOGO', '<i class="fa fa-home"></i> PIHome');
define('TITLE_DEFAULT', 'PIHome');
define('COPY', '<b><a href="http://pihome.harkemedia.de" target="_blank" title="PIHOME - Projectsite" id="copylink" title="PiHome">PIHome 2.0</a> &copy '.date('Y').'</b>');

/* Navigation */
define('NAV_home', 'Lamps');
define('NAV_alloff', 'All Off');
define('NAV_weather', 'Weather');
define('NAV_rooms', 'Room');
define('NAV_settings', 'Settings');
define('NAV_set_devices', 'Lamps');
define('NAV_set_room', 'Rooms');
define('NAV_set_user', 'Users');
define('NAV_calendar', 'calender');
define('NAV_set_settings', 'Settings');
define('NAV_edit_pass', 'Edit Password');
define('NAV_signout', 'Sign Out');

/* Weather */
define('WEATHER_TITLE', 'Weather for');
define('WEATHER_SUNRISE', 'Sunrise');
define('WEATHER_SUNSET', 'Sunset');
define('WEATHER_WIND', 'Wind speed');
define('WEATHER_CLOCK', 'O Clock');

/* ALL OFF */
define('AO_device_off', 'Off devices');
define('AO_question', 'Do you want to turn off all devices?');
define('AO_cancel', 'cancel');
define('AO_all_off', 'shut off all');

/* 404 Page */
define('TITEL_404', '404 - This page does not exist!');
define('HEADLINE_404', 'Page not found - 404');

/* Page Title */
define('TITEL_HOME', 'PIHome - Lamps Overview');
define('TITLE_LOGIN', 'Login - PIHome Automation');
define('TITEL_ROOM', ' - Lamps - PIHome');
define('TITEL_LAMPS', 'Manage lamps - PIHome');
define('TITEL_ROOMS', 'Manage rooms - PIHome');
define('TITEL_USER', 'Manage users - PIHome');
define('TITEL_SETTINGS', 'System settings - PIHome');
define('TITEL_CHPW', 'Change Password - PIHome');

/* Button */
define('BTN_cancel', 'cancel');
define('BTN_save', 'save');
define('BTN_delete', 'delete');
define('BTN_ON', 'ON');
define('BTN_OFF', 'OFF');

/* Login */
define('LOGIN_user', 'Username');
define('LOGIN_pass', 'Password');
define('LOGIN_signin', 'Sign In');

/* Devices */
define('LAMP_HEADLINE', 'Lamps');
define('LAMP_add', 'Add lamp');
define('LAMP_sunset', 'sunset');
define('LAMP_stat', 'status');
define('LAMP_edit', 'edit');
define('LAMP_name', 'name');
define('LAMP_room', 'room');
define('LAMP_code', 'code');
define('LAMP_sort', 'sorting');
define('LAMP_edit_lamp', 'Edit lamp');
define('LAMP_del_lamp', 'Delete lamp');
define('LAMP_del_quest', 'Do you want to delete this lamp?');

/* Rooms */    
define('ROOM_HEADLINE', 'Rooms');
define('ROOM_add', 'Add room');
define('ROOM_room', 'room');
define('ROOM_edit_room', 'Edit room');
define('ROOM_del_room', 'Delete room');
define('ROOM_del_quest', 'Do you want to delete this room?');

/* User */
define('USER_HEADLINE', 'Users');
define('USER_add', 'Add user');
define('USER_username', 'username');
define('USER_name', 'name');
define('USER_stats', 'users status');
define('USER_color', 'color');
define('USER_api_key', 'User Api-Key');
define('USER_edit_user', 'Edit user');
define('USER_pass', 'password');
define('USER_del_user', 'Delete user');
define('USER_del_quest', 'Do you want to delete this user?');
    
/* Settings */    
define('SET_HEADLINE', 'PIHome Settings');
define('SET_sunrise', 'sunrise');
define('SET_city', 'city');
define('SET_timezone', 'timezone');
define('SET_country_code', 'country code');
define('SET_weather', 'weather');
define('SET_units', 'units');
define('SET_gcal', 'Google calender');
define('SET_gcal_url', 'Google calender Url');
define('SET_caldav', 'CalDAV calender');
define('SET_user', 'CalDAV user');
define('SET_pass', 'CalDAV password');
define('SET_caldav_url', 'CalDav url');

/* Edit Password */    
define('PWCH_HEADLINE', 'Change password');
define('PWCH_pass', 'password');
define('PWCH_new_pw', 'new password');
define('PWCH_newpw2', 'repeat password');
define('PWCH_save_pw', 'Save New Password');
        
?>