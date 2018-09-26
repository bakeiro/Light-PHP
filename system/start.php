<?php

//Database
$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
mysqli_set_charset($temp_con,"utf8");
Connection::$CONN = $temp_con;

//Url
Url::init();

//Loader
Output::$scripts = array();
Output::$styles = array();

//Session
Session::start();

//Errors
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Config
require(SYSTEM."config/config_data.php");
require(SYSTEM."config/php_settings.php");

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//escape $_POST,$_GET,$_COOKIE
Util::cleanInput();

//Engine finished
Config::set("loaded", true);