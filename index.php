<?php

// Routes
define("DIR_ROOT", __DIR__);
define("SYSTEM", DIR_ROOT . "/system/");
define("MODEL", DIR_ROOT . "/src/model/");
define("CONTROLLER", DIR_ROOT . "/src/controller/");
define("VIEW", DIR_ROOT . "/src/view/");

// Engine
require SYSTEM . "engine/Router.php";
require SYSTEM . "engine/Controller.php";
require SYSTEM . "engine/SessionSecureHandler.php";
require SYSTEM . "engine/Errors.php";
require SYSTEM . "engine/Autoloader.php";

// Library
require SYSTEM . "library/Config.php";
require SYSTEM . "library/Console.php";
require SYSTEM . "library/Output.php";
require SYSTEM . "library/Session.php";
require SYSTEM . "library/Database.php";
require SYSTEM . "library/Util.php";

// Config
require DIR_ROOT . "/config.php";

// Startup
require SYSTEM . "startup.php";

// Controller
$Controller = new Controller();
$Controller->execController();
