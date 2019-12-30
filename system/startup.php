<?php

use Library\Util;
use Library\Config;
use Library\Session;

// Composer
require SYSTEM."composer/vendor/autoload.php";

// Timezone
date_default_timezone_set(Config::get("default_time_zone"));

// Error/warning reporting
$error_class = new Errors();
set_error_handler(array($error_class,"myErrorHandler"), E_ALL);
error_reporting(E_ALL);

// Debug info
if (Config::get("show_debug_info")) {
    set_exception_handler(array($error_class,"my_exception_handler"));
    Config::set("debug_console", false);
    Config::set("whoops", false);
}

// Urls
$router = new Router();

Config::set("url_host", $router->protocol);
Config::set("url_protocol", $router->host);
Config::set("url_action", $router->action);
Config::set("url_controller", $router->controller);
Config::set("url_restController", $router->restController);

// Session
Session::init();
Session::start();

if (!Session::isValid()) {
    Session::forget();
}

// CSRF token
if (Session::get("csrf_token") === null) {
    Session::set("csrf_token", Util::generateCSRFToken());
    Session::set("CSRF_input", "<input type='text' name='csrf_token' hidden value='".Session::get("csrf_token")."' />");
}

if (!Config::get("allow_forms_without_csrf_input")) {
    Util::checkPostCSRFToken();
}

// escape + strip tags + trim for $_POST,$_GET
Util::cleanInput();

// Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());

// Console info
Config::set("console_db_queries", array());
Config::set("console_warnings", array());
Config::set("console_errors", array());
Config::set("console_debug_info", array());
Config::set("console_execution_trace", array());

// Autoloader
$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('Controller', DIR_ROOT.'/controller');
$loader->addNamespace('Model', DIR_ROOT.'/model');
$loader->addNamespace('Library', DIR_ROOT.'/system/library');

// Track execution time
Config::set("controller_execution_time", microtime(true));
