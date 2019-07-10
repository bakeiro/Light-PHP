<?php

class SecController
{
    public function __contruct()
    {
        if (!Config::get("loaded")) {
            die("Error, engine not loaded");
        }
    }
}
