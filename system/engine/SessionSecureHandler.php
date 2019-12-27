<?php

class SessionSecureHandler extends SessionHandler
{
    protected $iv;
    protected $key;
    protected $encrypt_method;

    /**
     * Constructor
     */
    public function __construct($session_iv, $session_key, $session_encrypt_method)
    {
        $this->iv = $session_iv;
        $this->key = $session_key;
        $this->encrypt_method = $session_encrypt_method;
    }

    /**
     * Read the encrypted values
     */
    public function read($session_id)
    {
        $data = parent::read($session_id);
        $data = (string) openssl_decrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return $data;
    }

    /**
     * Writes encrypted session values
     */
    public function write($session_id, $data)
    {
        $encrypted_data = openssl_encrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return parent::write($session_id, $encrypted_data);
    }
}
