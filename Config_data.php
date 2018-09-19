<?php

//Engine
Config::set("start_time", microtime(true));
Config::set("console_messages", array());

//Config
Config::set("site_name", "Backend");
Config::set("site_description", "Backend");
Config::set("site_creator", "David Baqueiro Santerbás");

Config::set("ftp_path_upload", SYSTEM."ftp/upload/");

Config::set("email_host", "***");
Config::set("email_username", "***");
Config::set("email_pass", "***");
Config::set("email_port", "***");
Config::set("email_from", "***");
Config::set("email_from_name", "***");

Config::set("image_cache_size_small", "***");
Config::set("image_cache_size_medium", "***");
Config::set("image_cache_size_big", "***");

Config::set("session_frontend_time", 14400); //4h