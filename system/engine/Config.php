<?php

class Config
{

    public static $data;

    public static function Set($key, $value = "")
    {
        Config::$data[$key] = $value;
    }

    public static function Get($key)
    {
        if (isset(Config::$data[$key])) {
            return Config::$data[$key];
        } else {
            return null;
        }
    }
}
