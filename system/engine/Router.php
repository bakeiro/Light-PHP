<?php

class Router
{
    public $protocol;
    public $host;
    public $action;
    public $controller;
    public $restController;

    public function __construct()
    {
        // Host
        $url_host = 'http://';
        if (isset($_SERVER['HTTPS'])) {
            $url_host = 'https://';
        }
        $url_host .= $_SERVER['HTTP_HOST'];

        // Protocol
        $url_protocol = "http";
        if (isset($_SERVER['HTTPS'])) {
            $url_protocol = "https";
        }

        // Action
        $url_action = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $rest_controller = null;

        // Controller
        if (isset($_REQUEST['route']) && !isset($_REQUEST['rest'])) {
            $url_controller = $_REQUEST['route'];
        }
        if (isset($_REQUEST['rest']) && !isset($_REQUEST['route'])) {
            $rest_controller = $_REQUEST['rest'];
            $url_controller = 'api/rest';
        }
        if (!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])) {
            $url_controller = $this->getSeoUrlMethod($url_action);
        }

        $this->protocol = $url_protocol;
        $this->host = $url_host;
        $this->action = $url_action;
        $this->controller = $url_controller;
        $this->restController = $rest_controller;
    }

    public function getSeoUrlMethod($url_action)
    {
        include SYSTEM . "routes.php";

        $routes_name = array_keys($routes);

        if (in_array($url_action, $routes_name)) {
            return $routes[$url_action];
        } else {
            return "error/error/notFound";
        }
    }
}
