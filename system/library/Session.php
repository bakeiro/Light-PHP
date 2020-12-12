<?php

namespace Library;

/**
 * Session class to manage the session values in a encrypted way
 */
class Session
{
    public $name;
    public $cookie;

    /**
     * Initializes the session settings using a custom session handler
     *
     * @param \SessionHandlerInterface $session_handler custom session handler
     * @param string                   $session_name    name of the session
     * @param array                    $cookie          cookie
     *
     * @return void
     */
    public function __construct(\SessionHandlerInterface $session_handler, string $session_name, array $cookie = [])
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
     */
    public function start(): bool
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
    public function get(string $name)
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
     */
    public function set(string $name, string $value): void
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
     */
    public function isValid(): bool
    {
        return !$this->isExpired() && $this->isFingerprint();
    }

    /**
     * Checks wether the clients headers and the remote ip address didn't change
     */
    public function isFingerprint(): bool
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
     */
    public function isExpired(int $ttl = 30): bool
    {
        $last = isset($_SESSION['_last_activity']) ? $_SESSION['_last_activity'] : false;

        if ($last !== false && time() - $last > $ttl * 60) {
            return true;
        }

        $_SESSION['_last_activity'] = time();

        return false;
    }

    /**
     * Deletes and cleans the session
     */
    public function forget(): bool
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
