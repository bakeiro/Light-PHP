<?php

//Require
require(BACK_SYSTEM . 'core/Settings.php');
require(BACK_SYSTEM . 'core/Url.php');
require(BACK_SYSTEM . 'core/Controller.php');
//require(BACK_SYSTEM . 'core/Session.php');
//require(BACK_SYSTEM . 'core/Security.php');
require(BACK_SYSTEM . "core/View.php");
require(BACK_SYSTEM . 'core/Connection.php');
require(BACK_SYSTEM . 'core/Load.php');
require(BACK_SYSTEM . 'core/Functions.php');
require(BACK_SYSTEM . 'core/Error.php');

//App
$app_data = array();
$app_data['settings'] = new Settings();
$app_data['error'] = new ErrorClass();
$app_data['url'] = new Url();
$app_data['functions'] = new Functions();
$app_data['view'] = new viewClass();
$app_data['connection'] = new Connection();
$app_data['load'] = new Load();
$app_data['controller'] = new Controller();

//Error
set_error_handler( array( $app_data['error'],"error_handler") ,E_ALL);
$settings['error_handle'] = 'developing';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set("log_errors", 1);

//Settings
date_default_timezone_set('Europe/Madrid');


