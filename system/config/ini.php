<?php

// Errors
ini_set("display_errors", "On");
ini_set("log_errors", 1);

// Session settings
ini_set("session.auto_start", "Off");
ini_set("session.use_only_cookies", "On");
ini_set("session.use_cookies", "On");
ini_set("session.use_trans_sid", "Off");
ini_set("session.cookie_httponly", "On");

// Session duration
ini_set("session.cookie_lifetime", 90); // 0
ini_set("session.gc_maxlifetime", 90); // 4h, 14400

// Session garbage collector
ini_set("session.gc_probability", 1);
ini_set("session.gc_divisor", 100);

// Others
ini_set("expose_php", "Off");
ini_set("default_charset", "UTF-8");

// Limits
ini_set("max_input_time", 100);
ini_set("memory_limit", "32M");
ini_set("max_execution_time", 3600);
ini_set("upload_max_filesize", "99M");
ini_set("mysql.connect_timeout", 20);

// Common settings
// ini_set("magic_quotes_gpc",  "Off");
// ini_set("register_globals",  "Off");
// ini_set("safe_mode",  "Off");
// ini_set("session.cookie_lifetime",  3600);
// ini_set("allow_url_fopen",  "On");
// ini_set("error_reporting",  E_ALL);
