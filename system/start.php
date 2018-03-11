<?php

//Conn
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
	Url::$type = 'rest';
}
if(!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
	Url::$action = 'index/index';
	Url::$type = 'controller'; //TODO:  seo type, inside seo check whenther has something or only '/'
}

//Settings
Settings::set("site_name", "Backend");
Settings::set("site_description", "Backend");
Settings::set("site_creator", "David Baqueiro Santerbás");

Settings::set("ftp_path_upload", "/system/ftp/upload/");
Settings::set("ftp_path_download", "/system/ftp/downloads/");

Settings::set("email_name", "***");
Settings::set("email_server", "***");
Settings::set("email_account", "***");
Settings::set("email_pass", "***");
Settings::set("email_timeout", "***");

Settings::set("image_cache_size_small", "***");
Settings::set("image_cache_size_medium", "***");
Settings::set("image_cache_size_big", "***");

Settings::set('cache_version', '0.01');

//Loader
Loader::$scripts = array();
Loader::$styles = array();