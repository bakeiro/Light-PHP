<?php

/* Require */
require('system/config.php');
require('system/security.php');
require(DIR_SYSTEM_FRONTEND.'settings.php');
require(DIR_SYSTEM_FRONTEND.'routes.php'); //Same as frontend
require(DIR_VIEW_FRONTEND."viewClass.php");
require(DIR_MODEL_FRONTEND.'connectionModel.php');

/* Start connection */
$CONN = connectionModel::getConnection($host,$user,$pass,$ddbb);

/* Controller */
require($settings['controller']['file']);
$controller_class = new $settings['controller']['class'];
$settings['page'] = 'BACKEND';

/* Call the method */
$method = $settings['controller']['method'];
$controller_class->$method();