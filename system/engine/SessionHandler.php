<?php

class SecureSessionHandler extends SessionHandler {

	protected $key;
	protected $name;
	protected $cookie;
	protected $iv;
	protected $encrypt_method;
	
    public function __construct($name = 'MY_SESSION', $cookie = []){

        $this->name = $name;
		$this->cookie = $cookie;

        $this->key = Config::get("session_encrypt_password");
		$this->encrypt_method = Config::get("session_encrypt_method");
		$this->iv = Config::get("session_encrypt_iv");
		
        $this->cookie += [
            'lifetime' => 0, /* ini_get('session.gc_maxlifetime'),*/
            'path'     => ini_get('session.cookie_path'),
            'domain'   => ini_get('session.cookie_domain'),
            'secure'   => isset($_SERVER['HTTPS']),
            'httponly' => true
        ];
        $this->setup();
    }
    private function setup(){

        ini_set('session.use_cookies', 1);
        ini_set('session.use_only_cookies', 1);
        session_name($this->name);
        session_set_cookie_params(
            $this->cookie['lifetime'],
            $this->cookie['path'],
            $this->cookie['domain'],
            $this->cookie['secure'],
            $this->cookie['httponly']
        );
    }
    public function start(){
        if (session_id() === '') {
            if (session_start()) {
                return mt_rand(0, 4) === 0 ? $this->refresh() : true; // 1/5
            }
        }
        return false;
	}

    public function forget(){
        if (session_id() === '') {
            return false;
        }
        $_SESSION = [];
        setcookie(
            $this->name,
            '',
            time() - 42000,
            $this->cookie['path'],
            $this->cookie['domain'],
            $this->cookie['secure'],
            $this->cookie['httponly']
        );
        return session_destroy();
    }
    public function refresh(){
        return session_regenerate_id(true);
    }
    public function read($id){
		//return mcrypt_decrypt(MCRYPT_3DES, $this->key, parent::read($id), MCRYPT_MODE_ECB);
		$data = parent::read($id);
		$data = (string)openssl_decrypt($data , $this->encrypt_method, $this->key, 0, $this->iv);
		//$data = base64_decode($data);
		return $data;
	}
    public function write($id, $data){
		//return parent::write($id, mcrypt_encrypt(MCRYPT_3DES, $this->key, $data, MCRYPT_MODE_ECB));
		//$data = base64_encode($data);
		$encrypted_data = openssl_encrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
		return parent::write($id, $encrypted_data);
    }
    public function isExpired($ttl = 30){
        $last = isset($_SESSION['_last_activity'])
            ? $_SESSION['_last_activity']
            : false;
        if ($last !== false && time() - $last > $ttl * 60) {
            return true;
        }
        $_SESSION['_last_activity'] = time();
        return false;
    }
    public function isFingerprint(){
        $hash = md5(
            $_SERVER['HTTP_USER_AGENT'] .
            (ip2long($_SERVER['REMOTE_ADDR']) & ip2long('255.255.0.0'))
        );
        if (isset($_SESSION['_fingerprint'])) {
            return $_SESSION['_fingerprint'] === $hash;
        }
        $_SESSION['_fingerprint'] = $hash;
        return true;
    }
    public function isValid(){
        return ! $this->isExpired() && $this->isFingerprint();
    }
    public function get($name){
        $parsed = explode('.', $name);
        $result = $_SESSION;
        while ($parsed) {
            $next = array_shift($parsed);
            if (isset($result[$next])) {
                $result = $result[$next];
            } else {
                return null;
            }
        }
        return $result;
    }
    public function put($name, $value){
        $parsed = explode('.', $name);
        $session =& $_SESSION;
        while (count($parsed) > 1) {
            $next = array_shift($parsed);
            if ( ! isset($session[$next]) || ! is_array($session[$next])) {
                $session[$next] = [];
            }
            $session =& $session[$next];
        }
        $session[array_shift($parsed)] = $value;
    }
}