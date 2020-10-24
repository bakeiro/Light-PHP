<?php

// Relative paths from root
chdir(dirname(__DIR__));

// Routes
define("DIR_ROOT", dirname(__DIR__));
define("SYSTEM", DIR_ROOT . "/system/");
define("MODEL", DIR_ROOT . "/src/model/");
define("CONTROLLER", DIR_ROOT . "/src/controller/");
define("VIEW", DIR_ROOT . "/src/view/");

// Engine
require SYSTEM . "engine/Router.php";
require SYSTEM . "engine/Controller.php";
require SYSTEM . "engine/SessionSecureHandler.php";
require SYSTEM . "engine/Errors.php";
require SYSTEM . "engine/AutoLoader.php";

// AutoLoader
$loader = new Psr4AutoLoaderClass();
$loader->register();
$loader->addNamespace('Controller', DIR_ROOT.'/controller');
$loader->addNamespace('Model', DIR_ROOT.'/model');
$loader->addNamespace('Services', DIR_ROOT.'/system/services');
$loader->addNamespace('Engine', DIR_ROOT.'/system/engine');

// Bootstrap
require SYSTEM . "config/ini.php";
require SYSTEM . "startup.php";

// Start MVC
$Controller = new Controller($router->controller);
$Controller->execController();
