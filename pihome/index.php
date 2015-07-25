<?php
session_start();
require 'config/dbconfig.inc.php';
require 'config/session.inc.php';
require 'library/Controller.php';
require 'lang/'.LANGUAGE.'/index.php';
$controller = new Controller();
$controller->run();