<?php

//Start
require('system/config.php');
require(BACK_SYSTEM. 'App.php');
require(BACK_SYSTEM. 'StartUp.php');

//Modules
//require(back_system. modules autoload);
//require(BACK_SYSTEM. 'modules/console.php');
//require(BACK_SYSTEM. 'modules/dBug.php');
//require(BACK_SYSTEM.'modules/Header.php');

$app_data['controller']->exec_function();

$app_data['connection']->CONN->close();