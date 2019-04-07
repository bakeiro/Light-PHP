<?php

class SessionSecureHandler extends SessionHandler {

	protected $iv;
	protected $key;
	protected $encrypt_method;

	public function __construct(){
		$this->iv = Config::get("session_iv");
		$this->key = Config::get("session_key");
		$this->encrypt_method = Config::get("session_encrypt_method");
	}

	public function read($session_id){
		$data = parent::read($session_id);
		$data = (string)openssl_decrypt($data , $this->encrypt_method, $this->key, 0, $this->iv);
		return $data;
	}

  	public function write($session_id, $data){
		$encrypted_data = openssl_encrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
		return parent::write($session_id, $encrypted_data);
	}
  
}