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
define('NAV_home', 'Lampen');
define('NAV_alloff', 'Alle Aus');
define('NAV_weather', 'Wetter');
define('NAV_rooms', 'Räume');
define('NAV_settings', 'Einstellungen');
define('NAV_set_devices', 'Lampen');
define('NAV_set_room', 'Räume');
define('NAV_set_user', 'Benutzer');
define('NAV_calendar', 'Kalender');
define('NAV_set_settings', 'Einstellungen');
define('NAV_edit_pass', 'Passwort ändern');
define('NAV_signout', 'Abmelden');

/* Weather */
define('WEATHER_TITLE', 'Wetter für');
define('WEATHER_SUNRISE', 'Sonnenaufgang');
define('WEATHER_SUNSET', 'Sonnenuntergang');
define('WEATHER_WIND', 'Windgeschwindigkeit');
define('WEATHER_CLOCK', 'Uhr');

/* ALL OFF */
define('AO_device_off', 'Geräte ausschalten');
define('AO_question', 'Wollen Sie alle Geräte ausschalten?');
define('AO_cancel', 'Abbrechen');
define('AO_all_off', 'Alle ausschalten');

/* 404 Page */
define('TITEL_404', '404 - Diese Seite existiert nicht!');
define('HEADLINE_404', 'Seite nicht gefunden - 404');

/* Page Title */
define('TITEL_HOME', 'PIHome - Lampen Übersicht');
define('TITLE_LOGIN', 'Login - PIHome Automation');
define('TITEL_ROOM', ' - Lampen - PIHome');
define('TITEL_LAMPS', 'Lampen verwalten - PIHome');
define('TITEL_ROOMS', 'Raum verwalten - PIHome');
define('TITEL_USER', 'Benutzer verwalten - PIHome');
define('TITEL_SETTINGS', 'System Einstellungen - PIHome');
define('TITEL_CHPW', 'Passwort ändern - PIHome');

/* Button */
define('BTN_cancel', 'Abbrechen');
define('BTN_save', 'Speichern');
define('BTN_delete', 'Löschen');
define('BTN_ON', 'AN');
define('BTN_OFF', 'AUS');

/* Login */
define('LOGIN_user', 'Benutzername');
define('LOGIN_pass', 'Passwort');
define('LOGIN_signin', 'Einloggen');


/* Devices */
define('LAMP_HEADLINE', 'Lampen');
define('LAMP_add', 'Lampe hinzufügen');
define('LAMP_sunset', 'Sonnenuntergang');
define('LAMP_stat', 'Status');
define('LAMP_edit', 'Bearbeiten');
define('LAMP_name', 'Name');
define('LAMP_room', 'Raum');
define('LAMP_code', 'Code');
define('LAMP_sort', 'Sortierung');
define('LAMP_edit_lamp', 'Lampe bearbeiten');
define('LAMP_del_lamp', 'Lampe löschen');
define('LAMP_del_quest', 'Wollen Sie diese Lampe löschen?');

/* Rooms */    
define('ROOM_HEADLINE', 'Räume');
define('ROOM_add', 'Raum hinzufügen');
define('ROOM_room', 'Raum');
define('ROOM_edit_room', 'Raum bearbeiten');
define('ROOM_del_room', 'Raum löschen');
define('ROOM_del_quest', 'Wollen Sie diese Raum löschen?');

/* User */
define('USER_HEADLINE', 'Benutzer');
define('USER_add', 'Benutzer hinzufügen');
define('USER_username', 'Benutzername');
define('USER_name', 'Name');
define('USER_stats', 'Benutzerstatus');
define('USER_color', 'Farbe');
define('USER_api_key', 'Benutzer Api-Key');
define('USER_edit_user', 'Benutzer bearbeiten');
define('USER_pass', 'Passwort');
define('USER_del_user', 'Benutzer löschen');
define('USER_del_quest', 'Wollen Sie diesen Benutzer löschen?');
    
/* Settings */    
define('SET_HEADLINE', 'PIHome Einstellungen');
define('SET_sunrise', 'Sonnenuntergang');
define('SET_city', 'Stadt');
define('SET_timezone', 'Zeitzone');
define('SET_country_code', 'Ländercode');
define('SET_weather', 'Wetter');
define('SET_units', 'Maßeinheiten');
define('SET_gcal', 'Google Kalender');
define('SET_gcal_url', 'Google Kalender Url');
define('SET_caldav', 'CalDAV Kalender');
define('SET_user', 'Benutzer');
define('SET_pass', 'Passwort');
define('SET_caldav_url', 'CalDav Url');

/* Edit Password */    
define('PWCH_HEADLINE', 'Passwort ändern');
define('PWCH_pass', 'Passwort');
define('PWCH_new_pw', 'Neues Passwort');
define('PWCH_newpw2', 'Passwort wiederholen');
define('PWCH_save_pw', 'Neues Passwort speichern');
        
?>