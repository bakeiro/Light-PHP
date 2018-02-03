<?php

//Settings
$temp_settings = new Settings();

$temp_settings->set("site_name", "Backend");
$temp_settings->set("site_description", "Backend");
$temp_settings->set("site_creator", "David Baqueiro Santerbás");

$temp_settings->set("ftp_path", "/httpdocs");
$temp_settings->set("ftp_path_upload", "/httpdocs/site/upload");
$temp_settings->set("ftp_path_download", "/httpdocs/site/downloads");
$temp_settings->set("ftp_path_files", "/httpdocs/site/util");
$temp_settings->set("ftp_main_route", "C:/xampp/htdocs/");

$temp_settings->set('cache_version', '0.01');


//Error/warnings
$temp_error = new ErrorClass();

//Url
$temp_url = new urlClass();

//Functions
$temp_functions = new Functions();

//View
$temp_view = new viewClass();

//Connection
$temp_con = new Connection();

//Load
$temp_load = new Load();

//App
$App = array();
$App['settings'] = $temp_settings;
$App['error'] = $temp_error;
$App['url'] = $temp_url;
$App['functions'] = $temp_functions;
$App['view'] = $temp_view;
$App['connection'] = $temp_con;
$App['load'] = $temp_load;