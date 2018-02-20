<?php
abstract class App{

	public $settings;
	public $url;
	public $controller;
	//public $session;
	//public $security;
	public $view;
	public $conn;
	public $util;
	public $errors;

	public function __construct($app){
		$this->settings = $app['settings'];
		$this->url = $app['url'];
		$this->controller = $app['controller'];
		//$this->session = $app['session'];
		//$this->security = $app['security'];
		$this->view = $app['view'];
		$this->conn = $app['connection'];
		$this->util = $app['util'];
		$this->errors = $app['error'];
	}

}