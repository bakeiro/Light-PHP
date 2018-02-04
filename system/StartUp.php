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

//Controller
//$temp_controller =

//App
$app_data = array();
$app_data['settings'] = $temp_settings;
$app_data['error'] = $temp_error;
$app_data['url'] = $temp_url;
$app_data['functions'] = $temp_functions;
$app_data['view'] = $temp_view;
$app_data['connection'] = $temp_con;
$app_data['load'] = $temp_load;
$app_data['controller'] = new Controller();