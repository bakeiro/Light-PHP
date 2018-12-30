<?php

//Composer
require(SYSTEM."libraries/vendor/autoload.php");

//Error reporting
set_error_handler( array(new Errors(),"my_error_handler") ,E_ALL);
error_reporting(E_ALL);

//Database
$temp_con = mysqli_connect(Config::get("CONN_HOST"), Config::get("CONN_USER"), Config::get("CONN_PASS"), Config::get("CONN_DDBB"));
mysqli_set_charset($temp_con,"utf8");
Database::$CONN = $temp_con;

//Url
Url::init();

//Session
$sessionHandler = new SecureSessionHandler('key');
Session::init($sessionHandler);

//escape $_POST,$_GET,$_COOKIE
Util::cleanInput();

//Engine finished
Config::set("loaded", true);

//Finish script functions
register_shutdown_function(function(){
	//Session::$handler->close(); //Closes session handler
});

register_shutdown_function(function(){
	//Database::$CONN->close();//Closes db Database
});