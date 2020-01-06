<?php

class Router
{
    public $protocol;
    public $host;
    public $action;
    public $controller;
    public $restController;

    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
        $url_host = 'http://';
        if (isset($_SERVER['HTTPS'])) {
            $url_host = 'https://';
        }
        $url_host .= $_SERVER['HTTP_HOST'];

        $url_protocol = "http";
        if (isset($_SERVER['HTTPS'])) {
            $url_protocol = "https";
        }

        $url_action = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $rest_controller = null;

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

    /**
     * Executes the function associated in the SEO url
     *
     * @param string $url_action seo url to search
     *
     * @return string
     */
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
