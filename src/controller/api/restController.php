<?php
// phpcs:disable
use Library\Config;

/**
 * Middleware for returning the database model's function to a JSON to the client
 */

class RestController
{

    /**
     * Takes the model function, executes it, and returns an
     * json back to the client
     */
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
