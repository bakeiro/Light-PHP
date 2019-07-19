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
 * Security stuff
 *
 * The first time, you need at least, to modify the database credentials and the session variables.
 */

//Database
Config::set("CONN_HOST", "%host%");
Config::set("CONN_USER", "%user%");
Config::set("CONN_PASS", "%pass%");
Config::set("CONN_DDBB", "%database%");

//Session
Config::set("session_name", "MY_SESSION");
Config::set("session_encrypt_method", "aes-256-cbc");
Config::set("session_iv", "ThisIsMySecretIv"); //Replace here by a 16 char string (for encrypt and decrypt session data, ex: openssl_random_pseudo_bytes(16); //16 length string since openssl_cipher_iv_length("aes-256-cbc")) it's 16
Config::set("session_key", "ThisIsMySecretPass"); //Replace by a random string here (for encrypt and decrypt session data. ex: openssl_random_pseudo_bytes(32);

//Email
Config::set("email_host", "%email_host%");
Config::set("email_username", "%email_username%");
Config::set("email_pass", "%email_pass%");
Config::set("email_port", "%email_port%");
Config::set("email_from", "%email_from%");
Config::set("email_from_name", "%email_from_name%");

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
