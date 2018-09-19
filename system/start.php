<?php

//Database
$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
mysqli_set_charset($temp_con,"utf8");
Connection::$CONN = $temp_con;

Url::init();

//Loader
Output::$scripts = array();
Output::$styles = array();

//Session
Session::start();

Config::set("loaded", true);