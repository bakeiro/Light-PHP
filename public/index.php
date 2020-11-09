<?php

// Relative paths from root
chdir(dirname(__DIR__));

// ROOT constant
define("ROOT", dirname(__DIR__));

// Engine
require "system/engine/Router.php";
require "system/engine/Controller.php";
require "system/engine/SessionSecureHandler.php";
require "system/engine/Log.php";
require "system/engine/AutoLoader.php";

// AutoLoader
$loader = new Psr4AutoLoaderClass();
$loader->register();
$loader->addNamespace("Controller", "/controller");
$loader->addNamespace("Model", "/model");
$loader->addNamespace("Services", "/system/services");
$loader->addNamespace("Engine", "/system/engine");

// Environment
require "system/config/environment.php";

// Bootstrap
require "system/config/ini.php";
require "system/startup.php";

// Start MVC
$Controller = new Controller($router->controller);
$Controller->execController();
