<?php

/* Set route */
$settings['url']['route'] = 'index/index';
if(isset($_REQUEST['route'])){
    $settings['url']['route'] = $_REQUEST['route'];
}

$route = $settings['url']['route'];
$settings['controller']['data'] = explode('/',$route);
$settings['controller']['file'] = DIR_CONTROLLER.$settings['controller']['data'][0].'/'.$settings['controller']['data'][1].'Controller.php';
$settings['controller']['method'] = 'index';
$settings['controller']['class'] = $settings['controller']['data'][1].'Controller';


/* If the file doesnt exist*/
if(!file_exists($settings['controller']['file'])){
    $settings['controller']['file']    = DIR_CONTROLLER.'error/errorController.php';
    $settings['controller']['method']  = 'missing';
    $settings['controller']['class']   = 'errorController';
}


/* order/sales/showAll */
if(count($settings['controller']['data']) == '3'){

    //Method
    $settings['controller']['method'] = $settings['controller']['data'][2];


    //If the method doesnt exist
    require_once($settings['controller']['file']);
    $correct = method_exists($settings['controller']['class'],$settings['controller']['method']);

    if($correct === false){
        $settings['controller']['file']    = DIR_CONTROLLER.'error/errorController.php';
        $settings['controller']['method']  = 'missing';
        $settings['controller']['class']   = 'errorController';
    }
}