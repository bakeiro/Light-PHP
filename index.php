<?php

//Routes
define("DIR_ROOT", "C:/laragon/www/framework_php/");
define("SYSTEM", DIR_ROOT."system/");
define("MODEL", DIR_ROOT."site/model/");
define("CONTROLLER", DIR_ROOT."site/controller/");
define("VIEW", DIR_ROOT."site/view/");

//Config
require(SYSTEM . "engine/Config.php");
require(SYSTEM . "config/config_data.php");
require(SYSTEM . "config/php_settings.php");

//Engine
require(SYSTEM . "engine/Url.php");
require(SYSTEM . "engine/Controller.php");
require(SYSTEM . "engine/Session.php");
require(SYSTEM . "engine/SessionSecureHandler.php");
require(SYSTEM . "engine/Output.php");
require(SYSTEM . "engine/Database.php");
require(SYSTEM . "engine/Util.php");
require(SYSTEM . "engine/Errors.php");
require(SYSTEM . "engine/SecModel.php");
require(SYSTEM . "engine/SecController.php");

//Startup
require(SYSTEM. "startup.php");

//Controller
$Controller = new Controller();
$Controller->execController();

//Finish script functions
//Session::$handler->close();
//Database::$CONN->close();
//Database::query("SELECT pg_terminate_backend(pg_backend_pid())");