<?php

//Config
require('Config.php');

//Engine
require(SYSTEM . 'engine/Settings.php');
require(SYSTEM . 'engine/Url.php');
require(SYSTEM . 'engine/Controller.php');
//require(SYSTEM . 'engine/Session.php');
//require(SYSTEM . 'engine/Security.php');
require(SYSTEM . "engine/Output.php");
require(SYSTEM . 'engine/Connection.php');
require(SYSTEM . 'engine/Util.php');
require(SYSTEM . 'engine/Errors.php');
require(SYSTEM . 'engine/Loader.php');

require(SYSTEM. "Start.php");

$Controller = new Controller();
$Controller->exec_function();

Connection::$CONN->close();