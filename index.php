<?php

//Start
require('system/config.php');
require(BACK_SYSTEM. 'App.php');

//Require
require(BACK_SYSTEM . 'core/Settings.php');
require(BACK_SYSTEM . 'core/Url.php');
require(BACK_SYSTEM . 'core/Controller.php');
//require(BACK_SYSTEM . 'core/Session.php');
//require(BACK_SYSTEM . 'core/Security.php');
require(BACK_SYSTEM . "core/View.php");
require(BACK_SYSTEM . 'core/Connection.php');
require(BACK_SYSTEM . 'core/Load.php');
require(BACK_SYSTEM . 'core/Util.php');
require(BACK_SYSTEM . 'core/Error.php');

//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

//App
$app_data = array();
$app_data['settings'] = new Settings();
$app_data['error'] = new ErrorClass();
$app_data['url'] = new Url();
$app_data['util'] = new Util();
$app_data['view'] = new viewClass();
$app_data['connection'] = new Connection();
$app_data['loader'] = new Load();
$app_data['controller'] = new Controller();
$app_data['header'] = "Header"; //TODO: Headers before sent some data

//Error
$settings['error_handle'] = 'developing';

//Settings
date_default_timezone_set('Europe/Madrid');


$app_data['controller']->exec_function();

$app_data['connection']->CONN->close();