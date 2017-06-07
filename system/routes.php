<?php

/* Set route */
if(isset($_REQUEST['route'])){
    $settings['url']['route'] = $_REQUEST['route'];
}else{
    $settings['url']['route'] = 'index/index';
}

$route = $settings['url']['route'];

$settings['controller']['data'] = explode('/',$route);
$settings['controller']['file'] = DIR_CONTROLLER.$settings['controller']['data'][0].'/'.$settings['controller']['data'][1].'Controller.php';
$settings['controller']['method'] = 'index';
$settings['controller']['class'] = $settings['controller']['data'][1].'Controller';

/* order/sales/showAll */
if(count($settings['controller']['data']) == '3'){
    $settings['controller']['method'] = $settings['controller']['data'][2];
}

/* If the file doesnt exist*/
if(!file_exists($settings['controller']['file'])){
    $settings['controller']['file']    = DIR_CONTROLLER.'error/errorController.php';
    $settings['controller']['method']  = 'missing';
    $settings['controller']['class']   = 'errorController';
}

