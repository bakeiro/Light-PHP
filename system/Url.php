<?php

class urlClass{

	public $type;
	public $host;
	public $url = array();
	public $controller = array();

	public function urlClass(){

		//Host
		if(isset($_SERVER['HTTPS'])){ 
			$this->host = 'https://'.$_SERVER['HTTP_HOST'];
		}else{
			$this->host = 'http://'.$_SERVER['HTTP_HOST'];
		}

		$temp_route = '';
		$temp_name = '';
		if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->url['route'] = $_REQUEST['route'];
			$this->type = 'route';
			$temp_route = BACK_CONTROLLER;
			$temp_name = 'Controller';
		}
		if(isset($_REQUEST['model']) && !isset($_REQUEST['route'])){
			$this->url['route'] = $_REQUEST['model'];
			$this->type = 'model';
			$temp_route = BACK_MODEL;
			$temp_name = 'Model';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->url['route'] = 'index/index';
			$this->type = 'route';
		}

		//Data/File/Class
		$route = $this->url['route'];
		$this->controller['data'] = explode('/', $route);
		$this->controller['file'] = $temp_route . $this->controller['data'][0] . '/' . $this->controller['data'][1] . $temp_name.'.php';
		$this->controller['class'] = $this->controller['data'][1] . $temp_name;

		if(count($this->controller['data']) === 2){
			$this->controller['method'] = 'index';
		}else{
			$this->controller['method'] = $this->controller['data'][2];
		}

		//File
		if (!file_exists($this->controller['file'])) {
			$this->controller['file'] = BACK_CONTROLLER . 'error/errorController.php';
			$this->controller['method'] = 'missing';
			$this->controller['class'] = 'errorController';
		}


		//Method
		require_once($this->controller['file']);
		if (method_exists($this->controller['class'], $this->controller['method']) === false) {
			$this->controller['file'] = $temp_route . 'error/errorController.php';
			$this->controller['method'] = 'missing';
			$this->controller['class'] = 'errorController';
		}


		//Model
		if (isset($_REQUEST['model']) && !isset($_REQUEST['route'])) {

			//Save all this info in a new array, replace the $setting array info
			$settings['model'] = $settings['controller'];
			$this->controller['file'] = BACK_CONTROLLER.'api/restController.php';
			$this->controller['class'] = 'rest';
			$this->controller['method'] = 'rest';
		}
	}


}
