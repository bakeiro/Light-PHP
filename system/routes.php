<?php
$route = $settings['url']['route'];

$settings['controller']['data'] = explode('/',$route);
$settings['controller']['file'] = DIR_CONTROLLER.$settings['controller']['data'][0].'/'.$settings['controller']['data'][1].'Controller.php';
$settings['controller']['method'] = 'index';
$settings['controller']['class'] = $settings['controller']['data'][1].'Controller';

/* If the file doesnt exist*/
if(!file_exists($settings['controller']['file'])){
    $settings['controller']['file']    = DIR_CONTROLLER.'welcome/welcomeController.php';
    $settings['controller']['method']  = 'index';
    $settings['controller']['class']   = 'welcomeController';
}

/* order/sales/showAll */
if(count($settings['controller']['data']) == '3'){
    $settings['controller']['method'] = $settings['controller']['data'][2];
}

