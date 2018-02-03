<?php

//Settings
$temp_settings = new Settings();

//Site
$temp_settings->set("site_name", "Backend");
$temp_settings->set("site_description", "Backend");
$temp_settings->set("site_creator", "David Baqueiro Santerbás");

//Folders
$temp_settings->set("ftp_path", "/httpdocs");
$temp_settings->set("ftp_path_upload", "/httpdocs/site/upload");
$temp_settings->set("ftp_path_download", "/httpdocs/site/downloads");
$temp_settings->set("ftp_path_files", "/httpdocs/site/util");
$temp_settings->set("ftp_main_route", "C:/xampp/htdocs/");

//Cache
$temp_settings->set('cache_version', '0.01');

//Errors/Warnings
if( $temp_settings->get('errors') !== null){
	$temp_settings->set('errors', array());
}
if( $temp_settings->get('warnings') !== null){
	$temp_settings->set('warnings', array());
}


$App = array();
$App['settings'] = $temp_settings;