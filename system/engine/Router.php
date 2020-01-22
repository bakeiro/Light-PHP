<?php
// phpcs:disable PSR1.Classes.ClassDeclaration

/**
 * Parses the url, and sets useful information based in that, like if it's https, the domain name
 * protocol etc
 */
class Router
{
    public $protocol;
    public $host;
    public $action;
    public $controller;
    public $restController;

    /**
     * Parses the url, and saves useful information
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

        if (isset($_REQUEST['route'])) {
            $url_controller = $_REQUEST['route'];
        }
        if (!isset($_REQUEST['route'])) {
            $url_controller = $this->getSeoUrlMethod($url_action);
        }

        $this->protocol = $url_protocol;
        $this->host = $url_host;
        $this->action = $url_action;
        $this->controller = $url_controller;
        $this->restController = $rest_controller;
    }

    /**
     * Search the seo url entered in the function's parameter, in the routes.php file, and sets
     * controller, class and method associated to that seo url
     *
     * @param string $url_action seo url to search
     *
     * @return string
     */
    public function getSeoUrlMethod($url_action)
    {
        include SYSTEM . "config/routes.php";

        $routes_name = array_keys($routes);

        if (in_array($url_action, $routes_name)) {
            return $routes[$url_action];
        } else {
            return "error/error/notFound";
        }
    }
}
