<?php

$loaded_modules = get_loaded_extensions();
$loaded_all_dependencies = true;

if (!in_array("openssl", $loaded_modules)) {
  $loaded_all_dependencies = false;
}

if (!in_array("session", $loaded_modules)) {
  $loaded_all_dependencies = false;
}

if (!in_array("date", $loaded_modules)) {
  $loaded_all_dependencies = false;
}

if (!in_array("json", $loaded_modules)) {
  $loaded_all_dependencies = false;
}

if (!in_array("PDO", $loaded_modules)) {
  $loaded_all_dependencies = false;
}

$enough_php_version = version_compare(phpversion(), '7.1', '>') ? true : false;

require_once "./system/library/Util.php";
$config_string = file_get_contents("./system/config/config.php");

$util = new Library\Util();
$token_iv = $util->generateSimpleToken(16);
$config_string = str_replace("ThisIsMySecretIv", $token_iv, $config_string);

$token_pass = $util->generateSimpleToken(32);
$config_string = str_replace("ThisIsMySecretPass", $token_pass, $config_string);

file_put_contents("./system/config/config.php", $config_string);

rename("./system/config/config.php", "./system/config/config.php");
rename("./system/config/ini.php", "./system/config/ini.php");

unlink("README.md");
unlink("LICENSE.md");
