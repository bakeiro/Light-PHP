<?php

use Library\Config;

/**
 * Config variables:
 *
 * Database credentials
 * Session variables
 * Email credentials
 * TimeZone
 * Debug console (for outputting php errors and debug messages)
 * Cache number (in case you update the browser resources)
 */

// Database
Config::set("initialize_database", false);
Config::set("DB_HOST", "%DB_HOST%");
Config::set("DB_USER", "%DB_USER%");
Config::set("DB_PASS", "%DB_PASS%");
Config::set("DB_NAME", "%DB_NAME%");

// Session
Config::set("session_name", "MY_SESSION");
Config::set("session_encrypt_method", "aes-256-cbc");
Config::set("session_iv", "ThisIsMySecretIv"); // randomly generated in post install script
Config::set("session_key", "ThisIsMySecretPass"); // randomly generated in post install script

// Email
Config::set("email_host", "%EMAIL_HOST%");
Config::set("email_name", "%EMAIL_NAME%");
Config::set("email_pass", "%EMAIL_PASS%");
Config::set("email_port", "%EMAIL_PORT%");
Config::set("email_from", "%EMAIL_FROM%");
Config::set("email_from_name", "%EMAIL_FROM_NAME%");

// Timezone
Config::set("default_time_zone", "Europe/Madrid");

// Debug
Config::set("debug_console", true);
Config::set("execution_time", microtime(true));

// Cache (change it from update css/js/fonts in the client browser)
Config::set("cache_version", "0001");

// Security
Config::set("allow_forms_without_csrf_input", true); // Force POST request to implement csrf data
