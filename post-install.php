<?php

require_once("./system/engine/Util.php");
$config_string = file_get_contents('./config.rename.php');

$token_iv = Util::generateSimpleToken(16);
$config_string = str_replace("ThisIsMySecretIv", $token_iv , $config_string);

$token_pass = Util::generateSimpleToken(32);
$config_string = str_replace("ThisIsMySecretPass", $token_pass , $config_string);

file_put_contents('./config.rename.php', $config_string);
rename('./config.rename.php', 'config.php');

rename('php.rename.ini', 'php.ini');

unlink('README.md');
