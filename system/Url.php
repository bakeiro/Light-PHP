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

	}
}
