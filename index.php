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
require(BACK_SYSTEM . 'core/Util.php');
require(BACK_SYSTEM . 'core/Error.php');

//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

//App
$engine = array();
$engine['settings'] = new Settings();
$engine['error'] = new ErrorClass();
$engine['url'] = new Url();
$engine['util'] = new Util();
$engine['view'] = new viewClass();
$engine['connection'] = new Connection();
$engine['controller'] = new Controller();
$engine['header'] = "Header"; //TODO: Headers before sent some data

//Error
$settings['error_handle'] = 'developing';

$engine['controller']->exec_function();

$engine['connection']->CONN->close();