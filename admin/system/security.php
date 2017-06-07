<?php

/**** Cant see nothing if session is not active ****/
/* Start session */
if (session_id() == '') {
    session_start();
}

/* Make exception if comes from the login page */
//here

/* Check auth */
if (isset($_SESSION["autentificado"]) == false || $_SESSION["autentificado"] != true || !isset($_SESSION['autentificado'])) {
    $settings['error']['msg'] = "You need to login to see this page!";
    $_REQUEST['route'] = "admin/admin";
}

/* 1 day session */
if (!isset($_SESSION['date_visit']) || $_SESSION['date_visit'] !== date_format(date_create(), 'd-m-Y')) {
    $settings['error']['msg'] = "Session expired!";
    $_REQUEST['route'] = "admin/admin";
}