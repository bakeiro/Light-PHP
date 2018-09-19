<?php
class Session{
	
	//FIXME: Fix the Session fixation vulnerability -> https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes?rq=1
	//FIXME: Make remenber me cookie

	public static function start(){

		$session_time_out = Config::get("session_frontend_time");

		if(session_status() === 0 || session_status() === 1){
			session_start();
			ini_set('session.gc-maxlifetime', $session_time_out);
		}

		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_time_out)) {
			session_unset();
			session_destroy();
		}
		$_SESSION['LAST_ACTIVITY'] = time();

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