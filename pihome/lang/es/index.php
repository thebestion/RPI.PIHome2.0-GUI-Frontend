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
define('COPY', '<b><a href="http://pihome.harkemedia.de" target="_blank" title="PIHOME - Sitio del proyecto" id="copylink" title="PiHome">PIHome 2.0</a> &copy '.date('Y').'</b>');

/* Navigation */
define('NAV_home', 'Lámparas');
define('NAV_alloff', 'Todo Apagado');
define('NAV_weather', 'Clima');
define('NAV_rooms', 'Habitación');
define('NAV_settings', 'Configuración');
define('NAV_set_devices', 'Lámparas');
define('NAV_set_room', 'Habitaciones');
define('NAV_set_user', 'Usuarios');
define('NAV_calendar', 'Calendario');
define('NAV_set_settings', 'Configuración');
define('NAV_edit_pass', 'Editar Contraseña');
define('NAV_signout', 'Salir');

/* Weather */
define('WEATHER_TITLE', 'Clima para');
define('WEATHER_SUNRISE', 'Amanece');
define('WEATHER_SUNSET', 'Anochece');
define('WEATHER_WIND', 'Velocidad del viento');
define('WEATHER_CLOCK', 'horas');

/* ALL OFF */
define('AO_device_off', 'Apagar dispositivos');
define('AO_question', '¿Quieres apagar todos los dispositivos?');
define('AO_cancel', 'Cancelar');
define('AO_all_off', 'Apagar todo');

/* 404 Page */
define('TITEL_404', '¡404 - Esta página no existe!');
define('HEADLINE_404', 'Página no encontrada - 404');

/* Page Title */
define('TITEL_HOME', 'PIHome - Información general Lámparas');
define('TITLE_LOGIN', 'Acceso - PIHome Automatización');
define('TITEL_ROOM', ' - Lámparas - PIHome');
define('TITEL_LAMPS', 'Gestionar lámparas - PIHome');
define('TITEL_ROOMS', 'Gestionar habitaciones - PIHome');
define('TITEL_USER', 'Gestionar usuarios - PIHome');
define('TITEL_SETTINGS', 'Configuración del sistema - PIHome');
define('TITEL_CHPW', 'Cambiar contraseña - PIHome');

/* Button */
define('BTN_cancel', 'Cancelar');
define('BTN_save', 'Grabar');
define('BTN_delete', 'Borrar');
define('BTN_ON', 'ON');
define('BTN_OFF', 'OFF');

/* Login */
define('LOGIN_user', 'Nombre de usuario');
define('LOGIN_pass', 'Contraseña');
define('LOGIN_signin', 'Entrar');

/* Devices */
define('LAMP_HEADLINE', 'Lámparas');
define('LAMP_add', 'Añadir Lámparas');
define('LAMP_sunset', 'Anochecer');
define('LAMP_stat', 'Estado');
define('LAMP_edit', 'Editar');
define('LAMP_name', 'Nombre');
define('LAMP_room', 'Habitación');
define('LAMP_code', 'Código');
define('LAMP_sort', 'Clasificación');
define('LAMP_edit_lamp', 'Editar lámpara');
define('LAMP_del_lamp', 'Borrar lámpara');
define('LAMP_del_quest', '¿Quieres borrar esta lámpara?');

/* Rooms */
define('ROOM_HEADLINE', 'Habitaciones');
define('ROOM_add', 'Añadir habitación');
define('ROOM_room', 'Habitación');
define('ROOM_edit_room', 'Editar habitación');
define('ROOM_del_room', 'Borrar habitación');
define('ROOM_del_quest', '¿Quieres borrar esta habitación?');

/* User */
define('USER_HEADLINE', 'Usuarios');
define('USER_add', 'Añadir usuario');
define('USER_username', 'Nombre de usuario');
define('USER_name', 'Nombre');
define('USER_stats', 'Privilegios de usuario');
define('USER_color', 'Color');
define('USER_api_key', 'Api-Key de usuario');
define('USER_edit_user', 'Editar usuario');
define('USER_pass', 'Contraseña');
define('USER_del_user', 'Borrar usuario');
define('USER_del_quest', '¿Quieres borrar este usuario?');

/* Settings */
define('SET_HEADLINE', 'Configuración PIHome');
define('SET_sunrise', 'Amanecer');
define('SET_city', 'Ciudad');
define('SET_timezone', 'Zona horaria');
define('SET_country_code', 'Código de país');
define('SET_weather', 'Clima');
define('SET_units', 'Unidades');
define('SET_gcal', 'Calendario de Google');
define('SET_gcal_url', 'Url del calendario de Google');
define('SET_caldav', 'Calendario CalDAV');
define('SET_user', 'Usuario de CalDAV');
define('SET_pass', 'Contraseña de CalDAV');
define('SET_caldav_url', 'Url de CalDav');

/* Edit Password */
define('PWCH_HEADLINE', 'Cambiar contraseña');
define('PWCH_pass', 'Contraseña actual');
define('PWCH_new_pw', 'Nueva contraseña');
define('PWCH_newpw2', 'Repetir contraseña');
define('PWCH_save_pw', 'Grabar nueva contraseña');

?>
