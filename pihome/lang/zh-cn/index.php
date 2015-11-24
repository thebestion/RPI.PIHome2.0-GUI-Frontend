<?php
/*
 *
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
 * Translated by Wenchao Lin
*/
/* general */
define('LOGO', '<i class="fa fa-home"></i> PIHome');
define('TITLE_DEFAULT', 'PIHome');
define('COPY', '<b><a href="http://pihome.harkemedia.de" target="_blank" title="PIHOME - Projectsite" id="copylink" title="PiHome">PIHome 2.0</a> &copy '.date('Y').'</b>');

/* Navigation */
define('NAV_home', '照明');
define('NAV_alloff', '全关');
define('NAV_weather', '天气');
define('NAV_rooms', '房间');
define('NAV_settings', '设置');
define('NAV_set_devices', '照明');
define('NAV_set_room', '房间');
define('NAV_set_user', '用户');
define('NAV_calendar', '日历');
define('NAV_set_settings', '配置');
define('NAV_edit_pass', '密码');
define('NAV_signout', '退出');

/* Weather */
define('WEATHER_TITLE', 'Weather for');
define('WEATHER_SUNRISE', '日出');
define('WEATHER_SUNSET', '日落');
define('WEATHER_WIND', '风速');
define('WEATHER_CLOCK', 'O Clock');

/* ALL OFF */
define('AO_device_off', '关闭设备');
define('AO_question', '你确定关闭所有设备?');
define('AO_cancel', '取消');
define('AO_all_off', '关闭所有');

/* 404 Page */
define('TITEL_404', '404 - ( ⊙o⊙ )哇，找不到啦!');
define('HEADLINE_404', 'Page not found - 404');

/* Page Title */
define('TITEL_HOME', 'PIHome - 照明灯总览');
define('TITLE_LOGIN', '登录 - PIHome Automation');
define('TITEL_ROOM', ' - 照明 - PIHome');
define('TITEL_LAMPS', '灯具管理 - PIHome');
define('TITEL_ROOMS', '房间管理 - PIHome');
define('TITEL_USER', '用户管理 - PIHome');
define('TITEL_SETTINGS', '系统设置 - PIHome');
define('TITEL_CHPW', '更改密码 - PIHome');

/* Button */
define('BTN_cancel', '取消');
define('BTN_save', '保存');
define('BTN_delete', '删除');
define('BTN_ON', 'ON');
define('BTN_OFF', 'OFF');

/* Login */
define('LOGIN_user', '用户名');
define('LOGIN_pass', '密码');
define('LOGIN_signin', '登录');

/* Devices */
define('LAMP_HEADLINE', '设备');
define('LAMP_add', '添加灯');
define('LAMP_sunset', '日落');
define('LAMP_stat', '状态');
define('LAMP_edit', '编辑');
define('LAMP_name', '名字');
define('LAMP_room', '房间');
define('LAMP_code', '代码');
define('LAMP_sort', '排序');
define('LAMP_edit_lamp', '编辑灯');
define('LAMP_del_lamp', '删除灯');
define('LAMP_del_quest', '你确定要删除这个设备么?');

/* Rooms */    
define('ROOM_HEADLINE', '房间');
define('ROOM_add', '增加房间');
define('ROOM_room', '房间');
define('ROOM_edit_room', '编辑房间');
define('ROOM_del_room', '删除房间');
define('ROOM_del_quest', '你确定要删除这个房间么?');

/* User */
define('USER_HEADLINE', '用户');
define('USER_add', '添加用户');
define('USER_username', '用户名');
define('USER_name', '姓名');
define('USER_stats', '用户状态');
define('USER_color', '颜色');
define('USER_api_key', 'User Api-Key');
define('USER_edit_user', '编辑用户');
define('USER_pass', '密码');
define('USER_del_user', '删除用户');
define('USER_del_quest', '你确定删除这个用户么?');
    
/* Settings */    
define('SET_HEADLINE', 'PIHome设置');
define('SET_sunrise', '日出');
define('SET_city', '城市');
define('SET_timezone', '时区');
define('SET_country_code', '国家代码');
define('SET_weather', '天气');
define('SET_units', '单位');
define('SET_gcal', '谷歌日历');
define('SET_gcal_url', '谷歌日历Url');
define('SET_caldav', 'CalDAV 日历');
define('SET_user', 'CalDAV 用户名');
define('SET_pass', 'CalDAV 密码');
define('SET_caldav_url', 'CalDav url');

/* Edit Password */    
define('PWCH_HEADLINE', '更改密码');
define('PWCH_pass', '旧密码');
define('PWCH_new_pw', '新密码');
define('PWCH_newpw2', '重复新密码');
define('PWCH_save_pw', '确定更改密码');
        
?>
