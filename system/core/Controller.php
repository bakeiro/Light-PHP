<?php
class Controller{

	var $file;
	var $class;
	var $data;
	var $method;

	public function __construct(){

		$engine = $GLOBALS['engine'];
		
		if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){

			$route = $engine['url']->url;
			$this->data = explode('/', $route);
			$this->file = BACK_CONTROLLER . $this->data[0] . '/' . $this->data[1] . 'Controller.php';
			$this->class = $this->data[1] . 'Controller';

			if(count($this->data) === 2){
				$this->method = 'index';
			}else{
				$this->method = $this->data[2];
			}
		}

		if(!isset($_REQUEST['route']) && isset($_REQUEST['model'])){

			$this->file = BACK_CONTROLLER.'api/restController.php';
			$this->class = 'rest';
			$this->method = 'rest';
		}

		if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			//Seo url
			//index page
		}

	}

	public function exec_function(){

		$engine = $GLOBALS['engine'];

		//File
		if (!file_exists($this->file)) {
			$this->file = BACK_CONTROLLER . 'error/errorController.php';
			$this->method = 'missing';
			$this->class = 'errorController';
		}

		//Method
		require_once($this->file);
		if (method_exists($this->class, $this->method) === false) {
			$this->file = $temp_route . 'error/errorController.php';
			$this->method = 'missing';
			$this->class = 'errorController';
		}

		//Action
		$controller_class = new $this->class($engine);
		$method = $this->method;
		$controller_class->$method();
	}

}