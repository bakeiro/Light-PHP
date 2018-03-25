<?php
class Session{
	
	//FIXME: Fix the Session fixation vulnerability -> https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes?rq=1
	
	public static function start(){

		//Make the session avaliable during half day (60*60*12)
		$session_time_out = 43200;

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
		return $_SESSION[$key];
	}

	public static function set($key, $value){
		$_SESSION[$key] = $value;
	}


}