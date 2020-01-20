<?php

namespace Library;

/**
 * Static class, used for getting and setting important values of configuration, by default,
 * loads the config values from config.php file
 */
class Config
{
    public static $data;

    /**
     * Set value
     *
     * @param string $key   name of the key
     * @param mix    $value value to set
     *
     * @return void
     */
    public static function set($key, $value = "")
    {
        Config::$data[$key] = $value;
    }

    /**
     * Get the value
     *
     * @param string $key name of the key to get the value
     *
     * @return array|string|int|null
     */
    public static function get($key)
    {
        if (isset(Config::$data[$key])) {
            return Config::$data[$key];
        } else {
            return null;
        }
    }
}
