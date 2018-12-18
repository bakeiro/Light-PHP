<?php
class Url{

	public static $protocol;
	public static $host;

	public static $action;
	public static $controller;
	public static $restController;

	public static function init(){

		$url_config = array();

		//Host
		if(isset($_SERVER['HTTPS'])){ 
			$url_host = 'https://';
		}else{
			$url_host = 'http://';
		}
		$url_host .= $_SERVER['HTTP_HOST'];

		//Protocol
		if(isset($_SERVER['HTTPS'])){ 
			$url_protocol = "https";
		}else{
			$url_protocol = "http";
		}

		//Action
		$url_action = $_SERVER["REQUEST_URI"];
		$url_action = substr($url_action, 1);

		//Controller
		if(isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
			$url_controller = $_REQUEST['route'];
		}
		if(isset($_REQUEST['rest']) && !isset($_REQUEST['route'])){
			Config::set("url_restController", $_REQUEST['rest']);
			$url_controller = 'api/rest';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
			$url_controller = URL::getSeoUrlMethod();
		}

		Config::set("url_host", $url_host);
		Config::set("url_protocol", $url_protocol);
		Config::set("url_action", $url_action);
		Config::set("url_controller", $url_controller);
	}

	public static function getSeoUrlMethod(){

		require(SYSTEM."config/routes.php");

		$routes_name = array_keys($routes);

		$url_action = Config::get("url_action");

		if( in_array($url_action, $routes_name)){
			return $routes[$url_action];
		}else{
			return "error/error/notFound";
		}

	}
}