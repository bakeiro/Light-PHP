<?php
class Url{
	
	public static $type;
	public static $host;
	public static $action;
	public static $protocol;
	public static $restController;

	public function init(){

		if(isset($_SERVER['HTTPS'])){ 
			Url::$host = 'https://'.$_SERVER['HTTP_HOST'];
			Url::$protocol = "https";
		}else{
			Url::$host = 'http://'.$_SERVER['HTTP_HOST'];
			Url::$protocol = "http";
		}
		
		if(isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
			Url::$action = $_REQUEST['route'];
			Url::$type = 'controller';
		}
		if(isset($_REQUEST['rest']) && !isset($_REQUEST['route'])){
			Url::$restController = $_REQUEST['rest'];
			Url::$action = 'api/rest';
			Url::$type = 'controller';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['rest'])){
			Url::$action = 'index/index';
			Url::$type = 'controller'; //TODO: seo type, inside seo check whenther has something or only '/'
		}
	}
}