<?php

//Routes


//Database
Config::set("CONN_HOST", "localhost");
Config::set("CONN_USER", "root");
Config::set("CONN_PASS", "");
Config::set("CONN_DDBB", "framework");

//Debug
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

//Images
Config::set("image_cache_size_small", "***");
Config::set("image_cache_size_medium", "***");
Config::set("image_cache_size_big", "***");

//Session
//Config::set("session_handle", "Db");
//Config::set("session_handle", "file");

//Cache (front-end folder)
Config::set('cache_version', '1.0');

//Output files
Config::set("output_styles", array());
Config::set("output_scripts", array());