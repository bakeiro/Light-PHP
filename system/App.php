<?php
abstract class App{

	public $settings;
	public $url;
	public $controller;
	//public $session;
	//public $security;
	public $output;
	public $conn;
	public $util;
	public $errors;

	public function __construct($app){
		$this->settings = $app['settings'];
		$this->url = $app['url'];
		$this->controller = $app['controller'];
		//$this->session = $app['session'];
		//$this->security = $app['security'];
		$this->output = $app['output'];
		$this->conn = $app['connection'];
		$this->util = $app['util'];
		$this->errors = $app['error'];
	}

}