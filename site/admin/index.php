<?php

//Config
require('config.php');

//Load
require(SYSTEM . 'engine/Settings.php');
require(SYSTEM . 'engine/Url.php');
require(SYSTEM . 'engine/Session.php');
require(SYSTEM . 'engine/Output.php');
require(SYSTEM . 'engine/Connection.php');
require(SYSTEM . 'engine/Util.php');
require(SYSTEM . 'engine/Errors.php');
require(SYSTEM . 'engine/Loader.php');

//Bootstrap
require(SYSTEM. "Start.php");

//Cache
Settings::set('cache_version', '1.0');

//Errors
Settings::Set("debug", true);
set_error_handler(array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Admin
require(SYSTEM."engine/Admin.php");
$admin = new Admin();

//Execute controller
$Controller = $admin->checkSession();
$Controller->execController();

//DB
Connection::$CONN->close();