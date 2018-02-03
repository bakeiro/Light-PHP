<?php

$ignore_url = array('login/login/index','login/login/login','login/login/logout','login/login/forgot');

if(!in_array($settings['url']['route'],$ignore_url)){

    if($_SESSION['store'] === -1 || $_SESSION['date_login'] === -1 || $_SESSION['store'] === ""){

        $settings['controller']['file'] = BACK_CONTROLLER."login/loginController.php";
        $settings['controller']['class'] = "loginController";
        $settings['controller']['method'] = "logout";
        $_SESSION['output'][] = "Please log in";
    }

    $date_login = new DateTime($_SESSION['date_login']);
    $date_today = date_create();

    if (date_diff($date_login,$date_today)->d >= 2) {

        $settings['controller']['file'] = BACK_CONTROLLER."login/loginController.php";
        $settings['controller']['class'] = "loginController";
        $settings['controller']['method'] = "logout";
        $_SESSION['output'][] = "Session expired!";
    }
}