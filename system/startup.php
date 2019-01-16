<?php

//Timezone
date_default_timezone_set('Europe/Madrid');

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
$sessionHandler = new SecureSessionHandler();
Session::init($sessionHandler);

//escape + strip tags + trim for $_POST,$_GET,$_COOKIE
Util::cleanInput();

//Engine finished
Config::set("loaded", true);

//Finish script functions
register_shutdown_function(function(){
	//Session::$handler->close(); //Closes session handler
});

register_shutdown_function(function(){
	//Database::$CONN->close();//Closes db Database
	//$pdo->query('SELECT pg_terminate_backend(pg_backend_pid());');
});