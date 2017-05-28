<?php

/* Here just check the $_SESSION data to see if expired or incorrect or not login in */

/* Start session */
if (session_id() == '') {
    session_start();
}

/* Check if false authentification */
if (isset($_SESSION["autentificado"]) == false || $_SESSION["autentificado"] != true || !isset($_SESSION['autentificado'])) {
    header("location: ".$settings['url']['host']."2");
    session_destroy();
    die();
}

/* If $_SESSION['store_id'] is not defined */
if(!isset($_SESSION['store']['store_id'])){
    header("location: ".$settings['url']['host']."2");
    session_destroy();
    die();
}

/* Destroy after 1 day */
if ($_SESSION['date_visit'] !== date_format(date_create(), 'd-m-Y')) {
    header("location: ".$settings['url']['host']."1");
    session_destroy();
    die();
}