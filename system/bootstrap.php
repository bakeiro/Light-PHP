<?php

use Engine\Container;
use Library\Util;
use Library\Config;
use Library\Console;
use Library\Database;
use Library\Session;
use Library\Output;

// Composer
require "system/composer/vendor/autoload.php";

// container entries
$config = new Config("system/config/config.php", getenv("ENVIRONMENT"));

$console = new Console();

$router = new Router();

$util = new Util();

$output = new Output($config->get("template_header"), $config->get("template_footer"), $config->get("version_number"));

$logger = new Logger($config->get("log_path_error"), $config->get("log_path_notice"), $config->get("log_path_warning"), $config->get("log_path_unknown_error"), $console);

$session_handler = new SecureSession($config->get("session_iv"), $config->get("session_key"), $config->get("session_encrypt_method"));

$session = new Session($session_handler, $config->get("session_name"));

$database = new Database(false, $config->get("db_host"), $config->get("db_user"), $config->get("db_name"), $config->get("db_pass"), $console);

// Init database
if (isset($config->get['database_auto_init']) && $config->get['database_auto_init']) {
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
    $session->set("CSRF_input", "<input type='text' name='csrf_token' hidden value='" . $session->get("csrf_token")."' />");
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
$util->array_walk_recursive_referential($_GET, array($util, "preventXSS"));
$util->array_walk_recursive_referential($_GET, "trim");
$util->array_walk_recursive_referential($_GET, array($util, "escape"));

$util->array_walk_recursive_referential($_POST, array($util, "preventXSS"));
$util->array_walk_recursive_referential($_POST, "trim");
$util->array_walk_recursive_referential($_POST, array($util, "escape"));

// Add container entries
$container = new Container();
$container->set("config", $config);
$container->set("output", $output);
$container->set("logger", $logger);
$container->set("router", $router);
$container->set("session", $session);
$container->set("util", $util);
$container->set("console", $console);
$container->set("database", $database);

// use INI_SET config
$ini_variables = require "system/config/ini.php";
foreach ($ini_variables[getenv("ENVIRONMENT")] as $ini_name => $ini_value) {
    ini_set($ini_name, $ini_value);
}

// Timezone
date_default_timezone_set($config->get("system_default_time_zone"));

// Import the controller
$path_data = new $router->parsePath();

$method = $path_data->method;
$controller = $path_data->controller;
require $path_data->file;
