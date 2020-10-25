<?php

/**
 * Config array, used for specify the Services properties, and allows you to have different environments configuration
 *
 * Database credentials
 * Session variables
 * Email credentials
 * TimeZone
 * Debug console (for outputting php errors and debug messages)
 * Cache number (in case you update the browser resources)
 */

return [
    "development" => [
        "database_host" => "",
        "database_user" => "",
        "database_pass" => "",
        "dabatase_name" => "",
        "session_name" => "session",
        "session_encrypt_method" => "aes-256-cbc",
        "session_iv" => "ThisIsMySecretIv", // Generated automatically in the install process
        "session_key" => "ThisIsMySecretPass", // Generated automatically in the install process
        "email_host" => "",
        "email_name" => "",
        "email_pass" => "",
        "email_port" => "",
        "email_from" => "",
        "system_default_time_zone" => "Europe/Madrid",
        "system_debug_console" => true,
        "system_execution_time" => microtime(true),
        "system_cache_version" => 0001, // Refresh frontend cache
        "system_allow_forms_without_csrf" => false
    ],
    "production" => [
        "database_host" => "",
        "database_user" => "",
        "database_pass" => "",
        "dabatase_name" => "",
        "session_name" => "session",
        "session_encrypt_method" => "aes-256-cbc",
        "session_iv" => "ThisIsMySecretIv", // Generated automatically in the install process
        "session_key" => "ThisIsMySecretPass", // Generated automatically in the install process
        "email_host" => "",
        "email_name" => "",
        "email_pass" => "",
        "email_port" => "",
        "email_from" => "",
        "system_default_time_zone" => "Europe/Madrid",
        "system_debug_console" => true,
        "system_execution_time" => microtime(true),
        "system_cache_version" => 0001, // Refresh frontend cache
        "system_allow_forms_without_csrf" => false
    ]
];
