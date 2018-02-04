<?php

require('config.php');
require(BACK_SYSTEM . 'Settings.php');
require(BACK_SYSTEM . 'Url.php');
require(BACK_SYSTEM . 'Controller.php');
//require(BACK_SYSTEM . 'Session.php');
//require(BACK_SYSTEM . 'Security.php');
require(BACK_SYSTEM . "View.php");
require(BACK_SYSTEM . 'Connection.php');
require(BACK_SYSTEM . 'Load.php');
require(BACK_SYSTEM . 'Functions.php');
require(BACK_SYSTEM . 'Error.php');

//Init
require(BACK_SYSTEM. 'App.php');
require(BACK_SYSTEM. 'StartUp.php');

//Errors   
set_error_handler( array($temp_error,"error_handler") ,E_ALL);
$settings['error_handle'] = 'developing';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

ini_set("log_errors", 1);
date_default_timezone_set('Europe/Madrid');


//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

$app_data['controller']->exec_function();
