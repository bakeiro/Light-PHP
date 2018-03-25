<?php

define('DIR_ROOT','C:/xampp/htdocs/framework_php/');

//Routes
define('MODEL',DIR_ROOT.'site/model/');
define('CONTROLLER',DIR_ROOT.'site/controller/');
define('VIEW',DIR_ROOT.'site/view/');
define('SYSTEM',DIR_ROOT.'system/');

//DDBB
define('CONN_HOST','localhost');
define('CONN_USER','root');
define('CONN_PASS','');
define('CONN_DDBB','framework');

//Php settings
ini_set('display_errors', 'On');
ini_set("log_errors", 1);
date_default_timezone_set('Europe/Madrid');