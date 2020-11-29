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

    public $file;
    public $class;
    public $data;
    public $method;

    /**
     * Parses the url, and saves useful information
     *
     * @return void
     */
    public function __construct()
    {
        $url_protocol = "http";
        if (isset($_SERVER['HTTPS'])) {
            $url_protocol = "https";
        }

        $url_host = $url_protocol.'://'.$_SERVER['HTTP_HOST'];

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

    /**
     * Parses the url, and sets the controller, class and method based in that
     *
     * @param string $route url to parse
     *
     * @return void
     */
    public function __construct($route)
    {
        $url_split = explode('/', $route);
        $this->file = "src/" . $url_split[0] . '/controller/' . $url_split[1] . 'Controller.php';
        $this->class = "Controller\\" . ucfirst($url_split[1]) . 'Controller';

        $this->method = $url_split[2];
    }

    /**
     * Executes the controller
     *
     * @return void
     */
    public function execController()
    {
        $this->checkController();

        $controller_class = new $this->class();
        $method = $this->method;
        $controller_class->$method();
    }

    /**
     * Checks wether the file, class and method exist, if not, uses the error controller
     *
     * @return void
     */
    public function checkController()
    {
        if (!file_exists($this->file)) {
            $this->file = CONTROLLER . 'error/errorController.php';
            $this->method = 'notFound';
            $this->class = "Controller\\errorController";
        }

        include_once $this->file;
        if (method_exists($this->class, $this->method) === false) {
            $this->file = CONTROLLER . 'error/errorController.php';
            $this->method = 'notFound';
            $this->class = 'Controller\\errorController';
            include_once $this->file;
        }
    }
}
