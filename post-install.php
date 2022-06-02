<?php

$loaded_modules = get_loaded_extensions();
$unloaded_dependencies = [];

if (!in_array("openssl", $loaded_modules)) {
  $unloaded_dependencies[] = "openssl";
}

if (!in_array("session", $loaded_modules)) {
  $unloaded_dependencies[] = "session";
}

if (!in_array("date", $loaded_modules)) {
  $unloaded_dependencies[] = "date";
}

if (!in_array("json", $loaded_modules)) {
  $unloaded_dependencies[] = "json";
}

if (!in_array("PDO", $loaded_modules)) {
  $unloaded_dependencies[] = "PDO";
}

$enough_php_version = version_compare(phpversion(), '7.1', '>') ? true : false;

if (!$enough_php_version || !empty($unloaded_dependencies)) {

    $log_file_path = "system/logs/incompatibility_errors.log";

    if (!file_exists($log_file_path)) {
        $fileResource = fopen($log_file_path, "w");
        fclose($fileResource);
    }

    if (!$enough_php_version) {
        error_log("Version of PHP not compatible!" . "\n", 3, $log_file_path);
    }

    foreach($unloaded_dependencies as $unloaded_dependency) {
        error_log("Missing PHP module!: " . $unloaded_dependency . "\n", 3, $log_file_path);
    }
}

require_once "./system/services/Util.php";
$config_string = file_get_contents("./system/config/config.php");

$util = new Service\Util();
$token_iv = $util->generateSimpleToken(16);
$config_string = str_replace("ThisIsMySecretIv", $token_iv, $config_string);

$token_pass = $util->generateSimpleToken(32);
$config_string = str_replace("ThisIsMySecretPass", $token_pass, $config_string);

file_put_contents("./system/config/config.php", $config_string);

rename("./system/config/config.php", "./system/config/config.php");
rename("./system/config/ini.php", "./system/config/ini.php");

unlink("README.md");
unlink("LICENSE.md");
