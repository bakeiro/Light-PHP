<?php
class Controller{

	var $file;
	var $class;
	var $data;
	var $method;

	public function __construct(){

		if(Url::$type === "controller"){

			$route = Url::$action;
			$url_split = explode('/', $route);
			$this->file = BACK_CONTROLLER . $url_split[0] . '/' . $url_split[1] . 'Controller.php';
			$this->class = $url_split[1] . 'Controller';

			if(count($url_split) === 2){
				$this->method = 'index';
			}else{
				$this->method = $url_split[2];
			}
		}

		if(Url::$type === "rest"){

			$this->file = BACK_CONTROLLER.'api/restController.php';
			$this->class = 'restController';
			$this->method = 'index';
		}

		if(Url::$type === "seo"){
			//Seo url
			//index page
		}

	}

	public function exec_function(){

		//File
		if (!file_exists($this->file)) {
			$this->file = BACK_CONTROLLER . 'error/errorController.php';
			$this->method = 'notFound';
			$this->class = 'errorController';
		}

		//Method
		require_once($this->file);
		if (method_exists($this->class, $this->method) === false) {
			$this->file = $temp_route . 'error/errorController.php';
			$this->method = 'notFound';
			$this->class = 'errorController';
		}

		//Action
		$controller_class = new $this->class();
		$method = $this->method;
		$return = $controller_class->$method();
		return $return;
	}

}