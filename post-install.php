<?php

require_once "./system/library/Util.php";
$config_string = file_get_contents("./system/config/_config.php");

$token_iv = Library\Util::generateSimpleToken(16);
$config_string = str_replace("ThisIsMySecretIv", $token_iv, $config_string);

$token_pass = Library\Util::generateSimpleToken(32);
$config_string = str_replace("ThisIsMySecretPass", $token_pass, $config_string);

file_put_contents("./system/config/_config.php", $config_string);

rename("./system/config/_config.php", "./system/config/config.php");
rename("./system/config/_ini.php", "./system/config/ini.php");
rename("system/rename.writable", "system/writable");

unlink("README.md");
