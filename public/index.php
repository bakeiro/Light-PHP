<?php

// Relative paths from root
chdir(dirname(__DIR__));

// ROOT constant
define("ROOT", dirname(__DIR__));

// AutoLoader
require "system/engine/AutoLoader.php";

// Basic namespace mapping
$loader = new AutoLoaderClass();
$loader->register();
$loader->addNamespace("Engine", "system/engine");
$loader->addNamespace("Library", "system/library");

// Environment
require "system/config/environment.php";

// Bootstrap
require "system/config/ini.php";
require "system/bootstrap.php";

// Start MVC
$controller->$method();
