<?php

//Config
require('config.php');

//Engine
require(SYSTEM . 'engine/Config.php');
require(SYSTEM . 'engine/Url.php');
require(SYSTEM . 'engine/Controller.php');
require(SYSTEM . 'engine/Session.php');
//require(SYSTEM . 'engine/Security.php');
require(SYSTEM . "engine/Output.php");
require(SYSTEM . 'engine/Connection.php');
require(SYSTEM . 'engine/Util.php');
require(SYSTEM . 'engine/Errors.php');
require(SYSTEM . 'engine/SecModel.php');
require(SYSTEM . 'engine/SecController.php');

//Bootstrap
require("config_data.php");
require(SYSTEM. "start.php");

//Cache
Config::set('cache_version', '1.0');

//Errors
Config::Set("debug", false);
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//escape $_POST,$_GET,$_COOKIE
Util::cleanInput();

//Autoload composer libraries
require(SYSTEM."libraries/vendor/autoload.php");

//Execute controller
$Controller = new Controller();
$Controller->execController();

//FIXME: Somehow make the controller and model not callable if the index was not executed
//In opencart inherits from the controller class

//DB
Connection::$CONN->close();