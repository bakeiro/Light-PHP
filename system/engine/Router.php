<?php

class Router
{
    public static $protocol;
    public static $host;
    public static $action;
    public static $controller;
    public static $restController;

    public static function init()
    {
        //Host
        $url_host = 'http://';
        if (isset($_SERVER['HTTPS'])) {
            $url_host = 'https://';
        }
        $url_host .= $_SERVER['HTTP_HOST'];

        //Protocol
        $url_protocol = "http";
        if (isset($_SERVER['HTTPS'])) {
            $url_protocol = "https";
        }

        //Action
        $url_action = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $rest_controller = null;

        //Controller
        if (isset($_REQUEST['route']) && !isset($_REQUEST['rest'])) {
            $url_controller = $_REQUEST['route'];
        }
        if (isset($_REQUEST['rest']) && !isset($_REQUEST['route'])) {
            $rest_controller = $_REQUEST['rest'];
            $url_controller = 'api/rest';
        }
        if (!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])) {
            $url_controller = Router::getSeoUrlMethod($url_action);
        }

        Router::$protocol = $url_protocol;
        Router::$host = $url_host;
        Router::$action = $url_action;
        Router::$controller = $url_controller;
        Router::$restController = $rest_controller;
    }

    public static function getSeoUrlMethod($url_action)
    {
        require SYSTEM . "routes.php";

        $routes_name = array_keys($routes);

        if (in_array($url_action, $routes_name)) {
            return $routes[$url_action];
        } else {
            return "error/error/notFound";
        }

    }
}
