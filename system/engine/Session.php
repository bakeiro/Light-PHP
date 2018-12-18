<?php
class Session{

	public static $handler;

	public static function init(){

		//Handler
		require("system/handlers/session_handler/".Config::get("session_handle").".php");
		$handler_class = Config::get("session_handle");
		$handler_class = new $handler_class();
		Session::$handler = $handler_class;

		session_set_save_handler($handler_class);
		
		//Start
		session_start();

		//Timeout
		/*
		$user_session_time = ini_get('session.gc_maxlifetime');
		if(Session::get('LAST_ACTIVITY') && ((time() - Session::get('LAST_ACTIVITY')) > $user_session_time)){
			session_unset();
			session_destroy();
			session_start();
		}
		*/

		//5% regenerate session id
		//Regenerate session method
		//ip?
		
		
		Session::set('last_activity',time());
	}

	public static function get($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	public static function set($key, $value){
		$_SESSION[$key] = $value;
	}

}