<?php
class Settings{

	private $settings;
	public $ind = 0;

	public function __construct(){

		$this->set("site_name", "Backend");
		$this->set("site_description", "Backend");
		$this->set("site_creator", "David Baqueiro Santerbás");

		$this->set("ftp_path", "/httpdocs");
		$this->set("ftp_path_upload", "/httpdocs/site/upload");
		$this->set("ftp_path_download", "/httpdocs/site/downloads");
		$this->set("ftp_path_files", "/httpdocs/site/util");
		$this->set("ftp_main_route", "C:/xampp/htdocs/");

		$this->set('cache_version', '0.01');
	}

	public function get($key){
		if(isset($this->settings[$key])){
			return $this->settings[$key];
		}else{
			return null;
		}
	}

	public function set($key, $value =""){
		$this->settings[$key] = $value;
	}

	public function getValuesDB(){
		//TODO: Get the values from the ddbb and set them
		return 10;
	}
}