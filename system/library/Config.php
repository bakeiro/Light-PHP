<?php

namespace Library;

/**
 * Static class, used for setting and getting values of configuration
 * along the main execution
 */
class Config
{
    public static $data;

    /**
     * Set values
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
     * Get the value for a key
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
