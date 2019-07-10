<?php

class SecModel
{
    public function __construct()
    {
        if (!Config::get("loaded")) {
            die("Error, engine not loaded");
        }
    }
}
