<?php

/**
 * Here you can define the php_ini settings in one place, you can also make a php.ini file in the root of the app 
 */

//Errors
ini_set('display_errors', 'On');
ini_set("log_errors", 1);

//Session
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 14400); //4h
ini_set("expose_php", "Off");


/*
Common settings
max_input_time = 200
magic_quotes_gpc = Off
register_globals = Off
default_charset = UTF-8
memory_limit = 64M
max_execution_time = 36000
upload_max_filesize = 999M
safe_mode = Off
mysql.connect_timeout = 20
session.auto_start = Off
session.cookie_lifetime = 3600
allow_url_fopen = On
error_reporting = E_ALL
*/