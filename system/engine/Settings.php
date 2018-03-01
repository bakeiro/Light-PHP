<?php
class Settings{

	static $data;
	
	public static function Set($key, $value =""){
		Settings::$data[$key] = $value;
	}

	public static function Get($key){

		if(isset(Settings::$data[$key])){
			return Settings::$data[$key];
		}else{
			return null;
		}
	}
}