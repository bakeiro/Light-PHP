<?php

class restController
{
    public function index()
    {
        Config::set("url_controller", Config::get("url_restController"));

        $rest_controller = new Controller();
        $output = $rest_controller->execRest();

        if ($rest_controller->class !== "errorController") {
            header('Content-Type: application/json');
            echo json_encode($output);
        }
    }
}
