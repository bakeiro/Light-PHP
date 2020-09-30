<?php

/**
 * Class for checking out if the environment pass all the test meaning it contains all the needed dependencies to run
 * Light-PHP
 */
class EnvironmentTest extends TestCase
{
    public function testCheckLoadedExtensions(): boolean
    {
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

        return $loaded_all_dependencies;
    }

    public function testPHPVersion(): bool
    {
        return version_compare(phpversion(), '7.0', '>') ? true : false;
    }
}
