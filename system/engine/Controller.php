<?php

/**
 * Controller class, this class executes the main function based in the url,
 * checks wether the file, class and method exists, and executes it
 */
class Controller
{
    public $file;
    public $class;
    public $data;
    public $method;

    /**
     * Sets the correct values based in the url
     *
     * @param string $route route to parse
     *
     * @return void
     */
    public function __construct($route)
    {
        $url_split = explode('/', $route);
        $this->file = CONTROLLER . $url_split[0] . '/' . $url_split[1] . 'Controller.php';
        $this->class = "Controller\\" . ucfirst($url_split[1]) . 'Controller';

        if (count($url_split) === 2) {
            $this->method = 'index';
        } else {
            $this->method = $url_split[2];
        }
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
     * Executes the model function and returns the json to the client
     *
     * @return void
     */
    public function execRest()
    {
        $this->checkController();

        $data = $_GET;
        unset($data['rest']);
        $data = array_values($data);

        $controller_class = new $this->class();
        $method = $this->method;
        $output = call_user_func_array(array($controller_class, $method), $data);

        return $output;
    }

    /**
     * Checks wether the file, class and method exist in order to execute it
     *
     * @return void
     */
    public function checkController()
    {
        if (!file_exists($this->file)) {
            $this->file = CONTROLLER . 'error/errorController.php';
            $this->method = 'notFound';
            $this->class = 'errorController';
        }

        include_once $this->file;
        if (method_exists($this->class, $this->method) === false) {
            $this->file = CONTROLLER . 'error/errorController.php';
            $this->method = 'notFound';
            $this->class = 'errorController';
            include_once $this->file;
        }
    }
}
