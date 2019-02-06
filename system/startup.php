<?php

//Timezone
date_default_timezone_set(Config::get("default_time_zone"));

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//Error reporting
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Database
$temp_con = new PDO("mysql:host=" .Config::get("CONN_HOST"). ";port=3306;dbname=" . Config::get("CONN_DDBB"), Config::get("CONN_USER"), Config::get("CONN_PASS"));
$temp_con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //true prepare statements

$temp_con->exec("SET NAMES 'utf8'");
$temp_con->exec("SET CHARACTER SET utf8");
$temp_con->exec("SET CHARACTER_SET_CONNECTION=utf8");

Database::$CONN = $temp_con;

//Url
Url::init();

//Session
Session::init();
Session::start();

if (!Session::isValid()){
	Session::forget();
}

//escape + strip tags + trim for $_POST,$_GET
Util::cleanInput();

//Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());

//Engine finished
Config::set("loaded", true);

//Debug (whoops)
if(Config::get("whoops")){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}