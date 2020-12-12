<?php

// phpcs:disable PSR1.Classes.ClassDeclaration

namespace Engine;

/**
 * Class used to encrypt and decrypt session data
 */
class SecureSession extends \SessionHandler
{
    protected $iv;
    protected $key;
    protected $encrypt_method;

    /**
     * Constructor, sets the session_iv, session_key, and session_encrypt_method to the session Handler
     * in order to encrypt and decrypt
     *
     * @param string $session_iv             session iv
     * @param string $session_key            session key
     * @param string $session_encrypt_method session encrypt method
     *
     * @return void
     */
    public function __construct(string $session_iv, string $session_key, string $session_encrypt_method)
    {
        $this->iv = $session_iv;
        $this->key = $session_key;
        $this->encrypt_method = $session_encrypt_method;
    }

    /**
     * Read the encrypted values
     *
     * @param string $session_id session id to read the values
     *
     * @return array
     */
    public function read($session_id)
    {
        $data = parent::read($session_id);
        $data = (string) openssl_decrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return $data;
    }

    /**
     * Encrypt and save session values
     *
     * @param string $session_id session to write in the information
     * @param string $data       data to write into the session id
     *
     * @return array
     */
    public function write($session_id, $data)
    {
        $encrypted_data = openssl_encrypt($data, $this->encrypt_method, $this->key, 0, $this->iv);
        return parent::write($session_id, $encrypted_data);
    }
}
