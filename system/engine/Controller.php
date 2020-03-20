<?php
// phpcs:disable PSR1.Classes.ClassDeclaration

/**
 * Controller class, this class executes the main controller's function based in the url,
 * checks wether the file, class and method exists, and executes it, if not executes the error method
 */
class Controller
{
    public $file;
    public $class;
    public $data;
    public $method;

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
        $this->file = CONTROLLER . $url_split[0] . '/' . $url_split[1] . 'Controller.php';
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
