<?php
abstract class App{

	public $settings;
	public $url;
	public $session;
	public $security;
	public $view;
	public $conn;
	public $load;
	public $functions;
	public $errors;

	public function App($app){
		$this->settings = $app['settings'];
		$this->url = $app['url'];
		$this->session = $app['session'];
		$this->security = $app['security'];
		$this->view = $app['view'];
		$this->conn = $app['conn'];
		$this->load = $app['load'];
		$this->functions = $app['functions'];
		$this->errors = $app['errors'];
	}

}