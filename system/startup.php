<?php

// Timezone
date_default_timezone_set(Config::get("default_time_zone"));

// Composer
require(SYSTEM."composer/vendor/autoload.php");

// Error/warning reporting
$error_class = new Errors();
set_error_handler( array($error_class,"myErrorHandler") ,E_ALL);
error_reporting(E_ALL);

// Database
if(Config::get("initialize_database")){

    try {
        $temp_con = new PDO("mysql:host=" .Config::get("CONN_HOST"). ";port=3306;dbname=" . Config::get("CONN_DDBB"), Config::get("CONN_USER"), Config::get("CONN_PASS"));
        $temp_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // true prepare statements

        $temp_con->exec("SET NAMES 'utf8'");
        $temp_con->exec("SET CHARACTER SET utf8");
        $temp_con->exec("SET CHARACTER_SET_CONNECTION=utf8");

        Database::$CONN = $temp_con;

    } catch (\Throwable $th) {
        Console::addDebugInfo("Error loading database");
    }
}

// Urls
Router::init();

// Session
Session::init();
Session::start();

if(!Session::isValid()){
	Session::forget();
}

// CSRF token
if(Session::get("csrf_token") === null){
	Session::set("csrf_token", Util::generateCSRFToken());
	Session::set("CSRF_input", "<input type='text' name='csrf_token' hidden value='".Session::get("csrf_token")."' />");
}

if(!Config::get("allow_forms_without_csrf_input")){
	Util::checkPostCSRFToken();
}

// escape + strip tags + trim for $_POST,$_GET
Util::cleanInput();

// Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());

// Debug info
if(Config::get("show_debug_info")){
	set_exception_handler(array($error_class,"my_exception_handler"));
	Config::set("debug_console", false);
	Config::set("whoops", false);
}

// Console info
Config::set("console_db_queries", array());
Config::set("console_warnings", array());
Config::set("console_errors", array());
Config::set("console_debug_info", array());
Config::set("console_execution_trace", array());

// Track execution time
Config::set("controller_execution_time", microtime(true));

// Autoloader
$loader = new \System\Psr4AutoloaderClass;
$loader->register();
$loader->addNamespace('Controller', DIR_ROOT.'/controller');
$loader->addNamespace('Model', DIR_ROOT.'/model');
$loader->addNamespace('System', DIR_ROOT.'/system');
