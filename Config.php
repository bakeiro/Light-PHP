<?php

define('DIR_ROOT','C:/xampp/htdocs/framework_php/');

//Routes
define('BACK_MODEL',DIR_ROOT.'site/model/');
define('BACK_CONTROLLER',DIR_ROOT.'site/controller/');
define('BACK_VIEW',DIR_ROOT.'site/view/');
define('BACK_IMAGE',DIR_ROOT.'site/view/image/');
define('BACK_SYSTEM',DIR_ROOT.'system/');
define('BACK_LIBRARY',DIR_ROOT.'system/library/');

//DDBB
define('CONN_HOST','localhost');
define('CONN_USER','root');
define('CONN_PASS','');
define('CONN_DDBB','framework');

//Php settings
ini_set('display_errors', 'On');
ini_set("log_errors", 1);
date_default_timezone_set('Europe/Madrid');