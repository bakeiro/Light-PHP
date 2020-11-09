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

$output = new Output("template/common/Header.php", "template/common/Footer.php", $config->get("version_number"));

$logger = new Logger("system/logs/error.log", "system/logs/notice.log", "system/logs/warning.log", "system/logs/unknown_errors.log");

$router = new Router();

$session_handler = new SecureSession($config->get("session_iv"), $config->get("session_key"), $config->get("session_encrypt_method"));

$session = new Session($session_handler, $config->get("session_name"));

$util = new Util();

$console = new Console();

$database = new Database(false, $config->get("db_host"), $config->get("db_user"), $config->get("db_name"), $config->get("db_pass"));

// Init database
if (isset($config->get['db_auto_init']) && $config->get['db_auto_init']) {
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
$util->array_walk_recursive_referential($_GET, array("Library\Util", "preventXSS"));
$util->array_walk_recursive_referential($_GET, "trim");
$util->array_walk_recursive_referential($_GET, array("Library\Util", "escape"));

$util->array_walk_recursive_referential($_POST, array("Library\Util", "preventXSS"));
$util->array_walk_recursive_referential($_POST, "trim");
$util->array_walk_recursive_referential($_POST, array("Library\Util", "escape"));

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

// Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());

// Console info
Config::set("console_db_queries", array());
Config::set("console_warnings", array());
Config::set("console_errors", array());
Config::set("console_debug_info", array());
Config::set("console_execution_trace", array());

// use INI_SET config
$ini_variables = require "system/config/ini.php";
foreach ($ini_variables[getenv("ENVIRONMENT")] as $ini_name => $ini_value) {
    ini_set($ini_name, $ini_value);
}

// Timezone
date_default_timezone_set($config->get("default_time_zone"));

// Track execution time
Config::set("controller_execution_time", microtime(true));
