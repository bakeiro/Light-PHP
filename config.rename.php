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
Config::set("CONN_HOST", "localhost");
Config::set("CONN_USER", "root");
Config::set("CONN_PASS", "");
Config::set("CONN_DDBB", "framework");

// Session
Config::set("session_name", "MY_SESSION");
Config::set("session_encrypt_method", "aes-256-cbc");
Config::set("session_iv", "ThisIsMySecretIv"); // randomly generated in post install script
Config::set("session_key", "ThisIsMySecretPass"); // randomly generated in post install script

// Email
Config::set("email_host", "***");
Config::set("email_username", "***");
Config::set("email_pass", "***");
Config::set("email_port", "***");
Config::set("email_from", "***");
Config::set("email_from_name", "***");

// Timezone
Config::set("default_time_zone", "Europe/Madrid");

// Debug
Config::set("debug_console", true);
Config::set("execution_time", microtime(true));
Config::set("show_debug_info", false);

// Cache (change it from update css/js/fonts in the client browser)
Config::set("cache_version", "0001");

// Security
Config::set("allow_forms_without_csrf_input", true); // Force form to implement csrf inputs
