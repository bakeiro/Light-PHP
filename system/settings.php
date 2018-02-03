<?php
class Settings{

	private $settings;
	public $ind = 0;

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