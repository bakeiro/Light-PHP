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

$enough_php_version = version_compare(phpversion(), '7.0', '>') ? true : false;

require_once "./system/library/Util.php";
$config_string = file_get_contents("./system/config/_config.php");

$util = new Library\Util();
$token_iv = $util->generateSimpleToken(16);
$config_string = str_replace("ThisIsMySecretIv", $token_iv, $config_string);

$token_pass = $util->generateSimpleToken(32);
$config_string = str_replace("ThisIsMySecretPass", $token_pass, $config_string);

file_put_contents("./system/config/_config.php", $config_string);

rename("./system/config/_config.php", "./system/config/config.php");
rename("./system/config/_ini.php", "./system/config/ini.php");

mkdir("./system/writable");
mkdir("./system/writable/logs");
mkdir("./system/writable/upload");

unlink("README.md");
unlink("LICENSE.md");
