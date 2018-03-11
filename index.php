<?php

//Config
require('Config.php');

//Load
require(BACK_SYSTEM . 'engine/Settings.php');
require(BACK_SYSTEM . 'engine/Url.php');
require(BACK_SYSTEM . 'engine/Controller.php');
//require(BACK_SYSTEM . 'engine/Session.php');
//require(BACK_SYSTEM . 'engine/Security.php');
require(BACK_SYSTEM . "engine/Output.php");
require(BACK_SYSTEM . 'engine/Connection.php');
require(BACK_SYSTEM . 'engine/Util.php');
require(BACK_SYSTEM . 'engine/Errors.php');
require(BACK_SYSTEM . 'engine/Loader.php');

//Bootstrap
require(BACK_SYSTEM. "Start.php");

//Errors
Settings::Set("debug", true);
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Execute controller
$Controller = new Controller();
$Controller->exec_function();

//DB
Connection::$CONN->close();