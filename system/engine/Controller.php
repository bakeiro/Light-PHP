<?php
class Controller{

	var $file;
	var $class;
	var $data;
	var $method;

	public function __construct(){

		if(Url::$type === "controller"){

			$route = Url::$action;
			$this->data = explode('/', $route);
			$this->file = BACK_CONTROLLER . $this->data[0] . '/' . $this->data[1] . 'Controller.php';
			$this->class = $this->data[1] . 'Controller';

			if(count($this->data) === 2){
				$this->method = 'index';
			}else{
				$this->method = $this->data[2];
			}
		}

		if(Url::$type === "model"){

			$this->file = BACK_CONTROLLER.'api/restController.php';
			$this->class = 'rest';
			$this->method = 'rest';
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
		$controller_class->$method();
	}

}