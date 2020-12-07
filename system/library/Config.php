<?php

namespace Library;

/**
 * class, used for getting and setting important values of configuration, by default,
 * loads the config values from config.php file
 */
class Config
{
    /**
     * PHP array of the config values
     */
    protected $data = [];

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
