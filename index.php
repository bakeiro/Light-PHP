<?php

// Routes
define("DIR_ROOT", __DIR__);
define("SYSTEM", DIR_ROOT . "/system/");
define("MODEL", DIR_ROOT . "/src/model/");
define("CONTROLLER", DIR_ROOT . "/src/controller/");
define("VIEW", DIR_ROOT . "/src/view/");

// Config
require SYSTEM . "engine/Config.php";
require DIR_ROOT . "/config.php";

// Engine
require SYSTEM . "engine/Router.php";
require SYSTEM . "engine/Controller.php";
require SYSTEM . "engine/Session.php";
require SYSTEM . "engine/Console.php";
require SYSTEM . "engine/SessionSecureHandler.php";
require SYSTEM . "engine/Output.php";
require SYSTEM . "engine/Database.php";
require SYSTEM . "engine/Util.php";
require SYSTEM . "engine/Errors.php";
require SYSTEM . "engine/Autoloader.php";

// Startup
require SYSTEM . "startup.php";

// Controller
$Controller = new Controller();
$Controller->execController();
