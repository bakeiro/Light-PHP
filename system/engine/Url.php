<?php
class Url{

	public static $protocol;
	public static $host;

	public static $action;
	public static $controller;
	public static $restController;

	public static function init(){

		//Host
		if(isset($_SERVER['HTTPS'])){ 
			Url::$host = 'https://';
		}else{
			Url::$host = 'http://';
		}
		Url::$host .= $_SERVER['HTTP_HOST'];

		//Protocol
		if(isset($_SERVER['HTTPS'])){ 
			Url::$protocol = "https";
		}else{
			Url::$protocol = "http";
		}

		//Action
		Url::$action = $_SERVER["QUERY_STRING"];
		//Parse action

		//Controller
		if(isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
			Url::$controller = $_REQUEST['route'];
		}
		if(isset($_REQUEST['rest']) && !isset($_REQUEST['route'])){
			Url::$restController = $_REQUEST['rest'];
			Url::$controller = 'api/rest';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){

			URL::getSeoUrls();
			Url::$controller = 'index/index';
		}

	}

	public static function getSeoUrls(){

		require(SYSTEM."config/routes.php");
		//print_r($routes);
		//print_r($_SERVER);


	}
}