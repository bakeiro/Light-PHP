<?php

use Engine\Container;
use Engine\Router;
use Engine\SecureSession;
use Library\Util;
use Library\Logger;
use Library\Config;
use Library\Console;
use Library\Database;
use Library\Session;
use Library\Output;

// Composer
require "system/composer/vendor/autoload.php";

// Config class
$config = new Config();

// Config values
$config_values = include "system/config/config.php";
foreach ($config_values[getenv("ENVIRONMENT")] as $key => $config_value) {
    $config->set($key, $config_value);
}

// Config PHP values
$ini_variables = include "system/config/ini.php";
foreach ($ini_variables[getenv("ENVIRONMENT")] as $ini_name => $ini_value) {
    ini_set($ini_name, $ini_value);
}

// complete namespace mapping
$modules = scandir("src/");
array_shift($modules);
array_shift($modules);
foreach ($modules as $module) {
    $loader->addNamespace(ucfirst($module), "src/" . $module . "/controller");
    $loader->addNamespace(ucfirst($module), "src/" . $module . "/model");
}


$console = new Console($config->get("system_execution_time"));

$util = new Util();

$output = new Output($config->get("template_header"), $config->get("template_footer"), $config->get("system_cache_version"), $config->get('system_debug_console'), $console);

$logger = new Logger($config->get("log_path_error"), $config->get("log_path_notice"), $config->get("log_path_warning"), $config->get("log_path_unknown_error"), $console);

$session_handler = new SecureSession($config->get("session_iv"), $config->get("session_key"), $config->get("session_encrypt_method"));

$session = new Session($session_handler, $config->get("session_name"));

$database = new Database(false, $config->get("db_host"), $config->get("db_user"), $config->get("db_name"), $config->get("db_pass"), $console);

// Init database
if ($config->get('database_auto_init')) {
    $database->initialize();
}

// Init session
$session->start();

// If it's expired or fingerprint changed, reset the session
if (!$session->isValid()) {
    $session->forget();
}

// CSRF token (forms security)
if ($session->get("csrf_token") === null) {
    $session->set("csrf_token", $util->generateCSRFToken());
    $session->set("CSRF_input", "<input type='text' name='csrf_token' hidden value='" . $session->get("csrf_token") . "' />");
}

if (!$config->get("allow_forms_without_csrf_input")) {
    $util->checkPostCSRFToken();
}

// Error handler
set_error_handler(array($logger,"myErrorHandler"), E_ALL);
error_reporting(E_ALL);

// Exception handler
set_exception_handler(array($logger,"myExceptionHandler"));

// XSS, scape characters, SQL Injection
$util->arrayWalkRecursiveReferential($_GET, array($util, "preventXSS"));
$util->arrayWalkRecursiveReferential($_GET, "trim");
$util->arrayWalkRecursiveReferential($_GET, array($util, "escape"));

$util->arrayWalkRecursiveReferential($_POST, array($util, "preventXSS"));
$util->arrayWalkRecursiveReferential($_POST, "trim");
$util->arrayWalkRecursiveReferential($_POST, array($util, "escape"));

// Add container entries
$container = new Container();
$container->set("config", $config);
$container->set("console", $console);
$container->set("database", $database);
$container->set("logger", $logger);
$container->set("output", $output);
$container->set("session", $session);
$container->set("util", $util);

// Timezone
date_default_timezone_set($config->get("system_default_time_zone"));

// Import the controller
$router = new Router();
$path_data = $router->parsePath();

$method = $path_data["method"];
require_once $path_data["file"];
$controller = new $path_data["class"]();
