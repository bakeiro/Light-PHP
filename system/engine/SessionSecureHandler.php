<?php

class SessionSecureHandler extends SessionHandler
{
    protected $iv;
    protected $key;
    protected $encrypt_method;

    public function __construct()
    {
        $this->iv = Config::get("session_iv");
        $this->key = Config::get("session_key");
        $this->encrypt_method = Config::get("session_encrypt_method");
    }

    public function read($session_id)
    {
        $data = parent::read($session_id);
        $data = (string) openssl_decrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return $data;
    }

    public function write($session_id, $data)
    {
        $encrypted_data = openssl_encrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return parent::write($session_id, $encrypted_data);
    }

    //Methods for deleting remaining session files
    public function __destruct()
    {
        $gc_divisor = ini_get('session.gc_divisor');
        $gc_probability = ini_get('session.gc_probability');

        if ((rand() % $gc_divisor) < $gc_probability) {
            $expire = time() - ini_get('session.gc_maxlifetime');

            $files = glob(SYSTEM . '/writable/sessions/sess_*');

            foreach ($files as $file) {
                if (filemtime($file) < $expire) {
                    unlink($file);
                }
            }
        }
    }
}
