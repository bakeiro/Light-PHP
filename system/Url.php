<?php


//Url info
$settings['url']['host'] = 'http://'.$_SERVER['HTTP_HOST'];
if(isset($_SERVER['HTTPS'])){ 
    $settings['url']['host'] = 'https://'.$_SERVER['HTTP_HOST'];
}


//file/controller
$temp_route = '';
$temp_name = '';
$settings['url']['query'] = $_GET;

if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){

    unset($settings['url']['query']['route']);
    $settings['url']['route'] = $_REQUEST['route'];
    $settings['url']['type'] = 'route';
    $temp_route = BACK_CONTROLLER;
    $temp_name = 'Controller';
}
if(isset($_REQUEST['model']) && !isset($_REQUEST['route'])){

    unset($settings['url']['query']['model']);
    $settings['url']['route'] = $_REQUEST['model'];
    $settings['url']['type'] = 'model';
    $temp_route = BACK_MODEL;
    $temp_name = 'Model';
}
if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
    $settings['url']['route'] = 'order/managent';
    $settings['url']['type'] = 'route';
}


//Get file, method
$route = $settings['url']['route'];
$settings['controller']['data'] = explode('/', $route);
$settings['controller']['file'] = $temp_route . $settings['controller']['data'][0] . '/' . $settings['controller']['data'][1] . $temp_name.'.php';
$settings['controller']['class'] = $settings['controller']['data'][1] . $temp_name;


//Method
if(count($settings['controller']['data']) === 2){
    $settings['controller']['method'] = 'index';
}else{
    $settings['controller']['method'] = $settings['controller']['data'][2];
}


//Check file
if (!file_exists($settings['controller']['file'])) {
    $settings['controller']['file'] = BACK_CONTROLLER . 'error/errorController.php';
    $settings['controller']['method'] = 'missing';
    $settings['controller']['class'] = 'errorController';
}


//Check method
require_once($settings['controller']['file']);
if (method_exists($settings['controller']['class'], $settings['controller']['method']) === false) {
    $settings['controller']['file'] = $temp_route . 'error/errorController.php';
    $settings['controller']['method'] = 'missing';
    $settings['controller']['class'] = 'errorController';
}


//Model
if (isset($_REQUEST['model']) && !isset($_REQUEST['route'])) {

    //Save all this info in a new array, replace the $setting array info
    $settings['model'] = $settings['controller'];
    $settings['controller']['file'] = BACK_CONTROLLER.'api/restController.php';
    $settings['controller']['class'] = 'rest';
    $settings['controller']['method'] = 'rest';
}