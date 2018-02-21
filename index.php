<?php

//Start
require('Config.php');
require(BACK_SYSTEM. 'App.php');

//Require
require(BACK_SYSTEM . 'core/Settings.php');
require(BACK_SYSTEM . 'core/Url.php');
require(BACK_SYSTEM . 'core/Controller.php');
//require(BACK_SYSTEM . 'core/Session.php');
//require(BACK_SYSTEM . 'core/Security.php');
require(BACK_SYSTEM . "core/Output.php");
require(BACK_SYSTEM . 'core/Connection.php');
require(BACK_SYSTEM . 'core/Util.php');
require(BACK_SYSTEM . 'core/Error.php');

//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

//App
$engine = array();
$engine['settings'] = new Settings();
$engine['error'] = new ErrorMangent();
$engine['url'] = new Url();
$engine['output'] = new Output();
$engine['util'] = new Util();
$engine['connection'] = new Connection();
$engine['controller'] = new Controller();
$engine['header'] = "Header"; //TODO: Headers before sent some data, compression...

$engine['controller']->exec_function();

$engine['connection']->CONN->close();