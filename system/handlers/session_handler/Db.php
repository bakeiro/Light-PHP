<?php

class Db implements SessionHandlerInterface{

	public function __construct(){
		$this->expire = ini_get('session.gc_maxlifetime');
	}

	public function open($savePath, $sessionName){
		//DB connection already initialized
		return true;
	}

	public function close(){
		//The db connection closing happens already in register_shutdown_function
		//No need to close again the db connection
		return true;
	}
	
	public function read($session_id) {
		$query_data = Connection::query("SELECT `data` FROM `session` WHERE session_id = '".$session_id."' AND expire > " . (int)time());
		
		if($query_data){
			return $query_data["data"];
		}else{
			return "";
		}
	}
	
	public function write($session_id, $data) {		
		Connection::query("REPLACE INTO `session` SET session_id = '".$session_id."', `data` = '".$data."', expire = '" . date('Y-m-d H:i:s', time() + $this->expire) . "'");
		return true;
	}
	
	public function destroy($session_id) {
		Connection::query("DELETE FROM `session` WHERE session_id = '".$session_id."'");	
		return true;
	}
	
	public function gc($expire) {
		Connection::query("DELETE FROM `session` WHERE expire < " . ((int)time() + $expire));
		return true;
	}

}