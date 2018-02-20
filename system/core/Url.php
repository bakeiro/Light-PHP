<?php

class Url{

	public $type;
	public $host;
	public $action;
	public $protocol;

	public function __construct(){

		if(isset($_SERVER['HTTPS'])){ 
			$this->host = 'https://'.$_SERVER['HTTP_HOST'];
			$this->protocol = "https";
		}else{
			$this->host = 'http://'.$_SERVER['HTTP_HOST'];
			$this->protocol = "http";
		}

		if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->action = $_REQUEST['route'];
			$this->type = 'controller';
		}
		if(isset($_REQUEST['model']) && !isset($_REQUEST['route'])){
			$this->action = $_REQUEST['model'];
			$this->type = 'rest';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->action = 'index/index';
			$this->type = 'controller';
		}
	}
}