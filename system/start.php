<?php

//Config
require(SYSTEM."config/config_data.php");
require(SYSTEM."config/php_settings.php");

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//Error reporting
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Database
$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
mysqli_set_charset($temp_con,"utf8");
Connection::$CONN = $temp_con;

//Output
Output::$scripts = array();
Output::$styles = array();

//Url
Url::init();

//Session
Session::init();

//escape $_POST,$_GET,$_COOKIE
Util::cleanInput();

//Engine finished
Config::set("loaded", true);

//Finish script functions
register_shutdown_function(function(){
	//Session::$handler->close(); //Closes session handler
});

register_shutdown_function(function(){
	//Connection::$CONN->close();//Closes db connection
});