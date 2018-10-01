<?php

//Config
require('config.php');

//Engine
require(SYSTEM . 'engine/Config.php');
require(SYSTEM . 'engine/Url.php');
require(SYSTEM . 'engine/Controller.php');
require(SYSTEM . 'engine/Session.php');
require(SYSTEM . "engine/Output.php");
require(SYSTEM . 'engine/Connection.php');
require(SYSTEM . 'engine/Util.php');
require(SYSTEM . 'engine/Errors.php');
require(SYSTEM . 'engine/SecModel.php');
require(SYSTEM . 'engine/SecController.php');

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//Startup
require(SYSTEM. "start.php");

//Controller
$Controller = new Controller();
$Controller->execController();

//DB
Connection::$CONN->close();