<?php

namespace Services;

use Engine\Singleton;

/**
 * class, used for getting and setting important values of configuration, by default,
 * loads the config values from config.php file
 */
class Config extends Singleton
{
    /**
     * PHP array of the config values
     */
    protected $data = [];

    /**
     * Path of the config file to get the config values
     */
    protected $config_path;

    /**
     * Initializes the config class
     *
     * @param $config_path Specified he path of the config file
     */
    public function __construct($config_path)
    {
        $this->config_path = $config_path; // TODO: import
    }

    /**
     * Set value
     *
     * @param string $key   name of the key
     * @param mix    $value value to set
     *
     * @return void
     */
    public function set($key, $value = "")
    {
        $this->data[$key] = $value;
    }

    /**
     * Gets the value
     *
     * @param string $key name of the key to get the value
     *
     * @return array|string|int|null
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }
}
