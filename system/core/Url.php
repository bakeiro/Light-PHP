<?php

class Url{

	public $type;
	public $host;
	public $url;

	public function __construct(){

		if(isset($_SERVER['HTTPS'])){ 
			$this->host = 'https://'.$_SERVER['HTTP_HOST'];
		}else{
			$this->host = 'http://'.$_SERVER['HTTP_HOST'];
		}

		if(isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->url = $_REQUEST['route'];
			$this->type = 'route';
		}
		if(isset($_REQUEST['model']) && !isset($_REQUEST['route'])){
			$this->url = $_REQUEST['model'];
			$this->type = 'model';
		}
		if(!isset($_REQUEST['route']) && !isset($_REQUEST['model'])){
			$this->url = 'index/index';
			$this->type = 'route';
		}
	}
}