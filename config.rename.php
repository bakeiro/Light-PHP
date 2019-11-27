<?php

/**
 * Global variables, here you can set the configuration values like:
 *
 * Database credentials
 * Session variables
 * Email credentials
 * TimeZone
 * Debug console (for outputting php errors and debug messages)
 * Cache number (in case you update the browser resources)
 *
 * The first time, you need at least, to modify the database credentials and the session variables.
 */

//Database
Config::set("initialize_database", false);
Config::set("CONN_HOST", "localhost");
Config::set("CONN_USER", "root");
Config::set("CONN_PASS", "");
Config::set("CONN_DDBB", "framework");

//Session
Config::set("session_name", "MY_SESSION");
Config::set("session_encrypt_method", "aes-256-cbc");
Config::set("session_iv", "ThisIsMySecretIv");
Config::set("session_key", "ThisIsMySecretPass");

//Email
Config::set("email_host", "***");
Config::set("email_username", "***");
Config::set("email_pass", "***");
Config::set("email_port", "***");
Config::set("email_from", "***");
Config::set("email_from_name", "***");

//Timezone
Config::set("default_time_zone", "Europe/Madrid");

//Debug
Config::set("debug_console", true);
Config::set("send_email_errors", false); //enable this for sending one email every time an exception happens
Config::set("whoops", false);
Config::set("execution_time", microtime(true));

//Cache (change this number every time you update any css/js/image/font resource)
Config::set("cache_version", "0001");

//Security
Config::set("silent_debug", false); //Enable this in production environment
Config::set("allow_forms_without_csrf_input", true); //Disable this to force form to implement csrf inputs
