<?php

/* Require */
require('system/config.php');
require('system/settings.php');
//require('system/security.php');
require('system/routes.php');
require(DIR_VIEW."viewClass.php");
require(DIR_MODEL.'connectionModel.php');

/* Start connection */
$CONN = connectionModel::getConnection($host,$user,$pass,$ddbb);

/* Controller class and execute method */
require($settings['controller']['file']);
$controller_class = new $settings['controller']['class'];

/* Call the method */
$method = $settings['controller']['method'];
$controller_class->$method();