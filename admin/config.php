<?php

define('DIR_ROOT','C:/xampp/htdocs/framework_php/');

//Routes
define('SYSTEM',DIR_ROOT.'system/');

define('MODEL',DIR_ROOT.'admin/model/');
define('CONTROLLER',DIR_ROOT.'admin/controller/');
define('VIEW',DIR_ROOT.'admin/view/');

//DDBB
define('CONN_HOST','localhost');
define('CONN_USER','root');
define('CONN_PASS','');
define('CONN_DDBB','framework');

//Php settings
ini_set('display_errors', 'On');
ini_set("log_errors", 1);
date_default_timezone_set('Europe/Madrid');