<?php
class Controller{

	var $file;
	var $class;
	var $data;
	var $method;

	public function __construct(){

		if(Url::$type !== "seo"){

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

		if(Url::$type === "seo"){
			//Seo url
			//index page
		}

	}

	public function checkController(){
		
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
	}

	public function execController(){

		$this->checkController();

		//Action
		$controller_class = new $this->class();
		$method = $this->method;
		$controller_class->$method();
	}

	public function execRest(){
		
		$this->checkController();
		
		$data = array();

		$controller_class = new $this->class();
		$method = $this->method;
		$output = call_user_func_array(array($controller_class,$method),$data);
		
		return $output;
	}

}