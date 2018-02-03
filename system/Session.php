<?php


session_start();
if(!isset($_SESSION['errors'])){
    $_SESSION['errors'] = array();
}
if(!isset($_SESSION['output'])){
    $_SESSION['output'] = array();
}

$store_id = '';
$date_login = '';


if(!in_array($settings['url']['route'],array('login/login/logout'))){

    if(isset($_COOKIE['session_backend'])){
        
        $cookie_value = unserialize(base64_decode($_COOKIE['session_backend']));
        $store_id = $cookie_value['store'];
        $date_login = $cookie_value['date_login'];
    
    }else{        
        $store_id = -1;
        $date_login = -1;
    }
}


$_SESSION['store'] = $store_id;
$_SESSION['date_login'] = $date_login;