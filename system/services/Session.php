<?php

namespace Services;

use Engine\Singleton;

/**
 * Session class to manage the session values in a encrypted way
 */
class Session extends Singleton
{
    public $name;
    public $cookie;

    /**
     * Initializes the session settings using a custom session handler
     *
     * @param SessionHandler $session_handler custom session handler
     * @param string         $session_name    name of the session
     * @param array          $cookie          cookie
     *
     * @return void
     */
    public function init($session_handler, $session_name, $cookie = [])
    {
        session_set_save_handler($session_handler, true);

        $this->cookie = $cookie;
        $this->name = $session_name;
        $this->cookie += [
            'lifetime' => ini_get('session.gc_maxlifetime'),
            'path' => "/",
            'domain' => "",
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ];

        session_name($this->name);
        session_set_cookie_params(
            $this->cookie['lifetime'],
            $this->cookie['path'],
            $this->cookie['domain'],
            $this->cookie['secure'],
            $this->cookie['httponly']
        );
    }

    /**
     * Starts the session and checks that it's not empty, and regenerates the id of the session
     * with a probability of 1/5
     *
     * @return boolean
     */
    public function start()
    {
        if (session_id() === '') {
            if (session_start()) {
                return mt_rand(0, 4) === 0 ? session_regenerate_id() : true; // 1/5
            }
        }
        return false;
    }

    /**
     * Get function, gets the value inserted in the $name param
     *
     * @param string $name name of the array key to get the session value
     *
     * @return string|boolean
     */
    public function get($name)
    {
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

    /**
     * Writes the $value param into the $name index of the array
     *
     * @param string $name  name of the session index to store the value
     * @param string $value value to write into the session $name index
     *
     * @return void
     */
    public function set($name, $value)
    {
        $parsed = explode('.', $name);
        $session = &$_SESSION;
        while (count($parsed) > 1) {
            $next = array_shift($parsed);
            if (!isset($session[$next]) || !is_array($session[$next])) {
                $session[$next] = [];
            }
            $session = &$session[$next];
        }
        $session[array_shift($parsed)] = $value;
    }

    /**
     * Checks if the current session is valid, this means, that it's not expired
     * and that the fingerprint, didn't change
     *
     * @return boolean
     */
    public function isValid()
    {
        return !$this->isExpired() && $this->isFingerprint();
    }

    /**
     * Checks wether the clients headers and the remote ip address didn't change
     *
     * @return boolean
     */
    public function isFingerprint()
    {
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

    /**
     * Checks wether the session didn't expire (ttl)
     *
     * @param int $ttl time to live setting
     *
     * @return boolean
     */
    public function isExpired($ttl = 30)
    {
        $last = isset($_SESSION['_last_activity'])
        ? $_SESSION['_last_activity']
        : false;
        if ($last !== false && time() - $last > $ttl * 60) {
            return true;
        }
        $_SESSION['_last_activity'] = time();
        return false;
    }

    /**
     * Deletes and cleans the session
     *
     * @return boolean
     */
    public function forget()
    {
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
}
