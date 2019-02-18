<?php

/**
 * Here you can define the php_ini settings in one place, you can also make a php.ini file in the root of the app 
 */

//Errors
ini_set("display_errors", "On");
ini_set("log_errors", 1);

//Session
ini_set("session.cookie_lifetime", 0);
ini_set("session.gc_maxlifetime", 14400); //4h
ini_set("session.auto_start", "Off");

//Others
ini_set("expose_php", "Off");
ini_set("default_charset", "UTF-8");

//Limits
ini_set("max_input_time", 100);
init_set("memory_limit", "64M");
init_set("max_execution_time", 36000);
init_set("upload_max_filesize", "999M");
init_set("mysql.connect_timeout", 20);

/*
Common settings
magic_quotes_gpc = Off
register_globals = Off
safe_mode = Off
session.cookie_lifetime = 3600
allow_url_fopen = On
error_reporting = E_ALL
*/
