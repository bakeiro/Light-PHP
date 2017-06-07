<?php

/* Here define all the settings which i will need */
$settings = array();

/* Personal info */
$settings['dev_email'] = "davidbaqueiro@outlook.com";
$settings['dev_page'] = "https://github.com/bakeiro";

/* Site */
$settings['site']['name']         = "BaksFramework";
$settings['site']['description']  = "Small framework php for apps developement!";
$settings['site']['creator']      = "David Baqueiro Santerbás";

/* Contact */
$settings['contact']['email']     = "margot@oceanmaritimo.com";
$settings['contact']['number']    = "670080960";
$settings['contact']['name']      = "Margot";

/* Email */
$settings['email']['server']      = "mail-smtp.google.com";
$settings['email']['name']        = "davidbaqueiro@outlook.com";
$settings['email']['user']        = "david";
$settings['email']['pass']        = "########";
$settings['email']['smtp']        = "true";
$settings['email']['pop3']        = "true";

/* Url */
if(isset($_SERVER['HTTPS'])){
    $settings['url']['host'] = 'https://'.$_SERVER['HTTP_HOST'];
}else{
    $settings['url']['host'] = 'http://'.$_SERVER['HTTP_HOST'];
}

$settings['url']['script'] = $_SERVER['SCRIPT_NAME']; //index.php
$settings['url']['query'] = $_SERVER['QUERY_STRING']; //route=index/index
$settings['url']['url'] = $_SERVER['REQUEST_URI']; //index.php?route=index/index


/* Ftp info */
$settings['ftp']['host']               = "mysite.com";
$settings['ftp']['user']               = "user2";
$settings['ftp']['pass']               = "1111111";
$settings['ftp']['path']               = "/httpdocs";
$settings['ftp']['path_upload']        = "/httpdocs/site/upload";
$settings['ftp']['path_download']      = "/httpdocs/site/downloads";
$settings['ftp']['path_files']         = "/httpdocs/site/util";