<?php

use PHPUnit\Framework\TestCase;

/**
 * Class for checking out if the environment pass all the test meaning it contains all the needed dependencies to run
 * Light-PHP
 */
class EnvironmentTest extends TestCase
{
    public function testCheckLoadedExtensions(): void
    {
        $loaded_modules = get_loaded_extensions();

        $this->assertTrue(in_array("openssl", $loaded_modules));
        $this->assertTrue(in_array("session", $loaded_modules));
        $this->assertTrue(in_array("date", $loaded_modules));
        $this->assertTrue(in_array("json", $loaded_modules));
        $this->assertTrue(in_array("PDO", $loaded_modules));
    }

    public function testPHPVersion(): void
    {
        $this->assertTrue(version_compare(phpversion(), '7.0', '>'));
    }
}
