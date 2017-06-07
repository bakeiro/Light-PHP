<?php

/* Require */
require('system/config.php');
require('system/settings.php');
require('system/security.php');//it doenst exist yet
require('system/routes.php');
require(DIR_VIEW."viewClass.php");
require(DIR_MODEL.'connectionModel.php');

/* Start connection */
$CONN = connectionModel::getConnection($host,$user,$pass,$ddbb);

/* Controller class and execute method */
require_once($settings['controller']['file']);
$controller_class = new $settings['controller']['class'];
$settings['page'] = 'FRONTEND';

/* Call the method */
$method = $settings['controller']['method'];
$controller_class->$method();