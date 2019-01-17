<?php

//Global variables, this variables defines the framework behavior 

//Timezone
Config::set("default_time_zone", "Europe/Madrid");

//Database
Config::set("CONN_HOST", "localhost");
Config::set("CONN_USER", "root");
Config::set("CONN_PASS", "");
Config::set("CONN_DDBB", "framework");

//Debug console
Config::set("debug", false);
Config::set("send_email_errors", false);
Config::set("start_time", microtime(true));

//Ftp
Config::set("ftp_path_upload", SYSTEM."ftp/upload/");

//Email
Config::set("email_host", "***");
Config::set("email_username", "***");
Config::set("email_pass", "***");
Config::set("email_port", "***");
Config::set("email_from", "***");
Config::set("email_from_name", "***");

//Session 
Config::set("session_name", "MY_SESSION");
Config::set("session_encrypt_method", "aes-256-cbc");
Config::set("session_iv", "]JC+HIz3-aq128c]");
Config::set("session_key", "awd7192do3ab46sud10943qf00");

//Cache (change this number every time you update any css/js/image/font resource)
Config::set('cache_version', '0001');

//Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());