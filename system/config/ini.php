<?php

/**
 * This defines the php settings used later in ini_set()
 */

return [
    "development" => [
        "display_errors" => "On",
        "log_errors" => 1,

        "session.auto_start" => "Off",
        "session.use_only_cookies" => true,
        "session.use_cookies" => "On",
        "session.use_trans_sid" => "Off",
        "session.cookie_httponly" => "On",
        "session.cookie_lifetime" => 90,
        "session.gc_maxlifetime" => 90,
        "session.gc_probability" => 1,
        "session.gc_divisor" => 100,

        "expose_php" => "On",
        "default_charset" => "UTF-8",
        "max_input_time" => 200,
        "memory_limit" => "64M",
        "max_execution_time" => 7200,
        "upload_max_filesize" => "200M",
        "mysql.connect_timeout" => 40,
    ],
    "production" => [
        "display_errors" => "Off",
        "log_errors" => 0,

        "session.auto_start" => "Off",
        "session.use_only_cookies" => true,
        "session.use_cookies" => "On",
        "session.use_trans_sid" => "Off",
        "session.cookie_httponly" => "On",
        "session.cookie_lifetime" => 90,
        "session.gc_maxlifetime" => 90,
        "session.gc_probability" => 1,
        "session.gc_divisor" => 100,

        "expose_php" => "Off",
        "default_charset" => "UTF-8",
        "max_input_time" => 100,
        "memory_limit" => "32M",
        "max_execution_time" => 3600,
        "upload_max_filesize" => "99M",
        "mysql.connect_timeout" => 20,
    ]
];


// Common settings
// ini_set("magic_quotes_gpc",  "Off");
// ini_set("register_globals",  "Off");
// ini_set("safe_mode",  "Off");
// ini_set("session.cookie_lifetime",  3600);
// ini_set("allow_url_fopen",  "On");
// ini_set("error_reporting",  E_ALL);
