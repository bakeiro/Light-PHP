<?php

//Database
$temp_con = mysqli_connect(CONN_HOST, CONN_USER, CONN_PASS, CONN_DDBB);
mysqli_set_charset($temp_con,"utf8");
Connection::$CONN = $temp_con;

//Url
if(isset($_SERVER['HTTPS'])){ 
	Url::$host = 'https://'.$_SERVER['HTTP_HOST'];
	Url::$protocol = "https";
}else{
	Url::$host = 'http://'.$_SERVER['HTTP_HOST'];
	Url::$protocol = "http";
}

if(isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
	Url::$action = $_REQUEST['route'];
	Url::$type = 'controller';
}
if(isset($_REQUEST['rest']) && !isset($_REQUEST['route'])){
	Url::$restController = $_REQUEST['rest'];
	Url::$action = 'api/rest';
	Url::$type = 'controller';
}
if(!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
	Url::$action = 'index/index';
	Url::$type = 'controller'; //TODO: seo type, inside seo check whenther has something or only '/'
}

//Loader
Loader::$scripts = array();
Loader::$styles = array();

//Session
Session::start();

Settings::set("loaded", true);