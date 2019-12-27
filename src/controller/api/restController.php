<?php
// phpcs:disable
use Library\Config;

/**
 * Special controller, this class it's executed when the route it's model=file/class/method
 * this controller, executes the model's function, and return a JSON to the client
 * basically, if you developed the model's function, with this you don't need a controller
 */

class RestController
{

    /**
     * Takes the model function, executes it, and returns an
     * json back to the client
     *
     * @return void
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
