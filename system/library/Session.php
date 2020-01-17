<?php

namespace Library;

class Session
{
    public static $name;
    public static $cookie;

    /**
     * Initializes the session settings using a custom session handler
     *
     * @param SessionHandler $session_handler custom session handler
     * @param string         $session_name    name of the session
     * @param array          $cookie          cookie
     *
     * @return void
     */
    public static function init($session_handler, $session_name, $cookie = [])
    {
        session_set_save_handler($session_handler, true);

        Session::$cookie = $cookie;
        Session::$name = $session_name;
        Session::$cookie += [
            'lifetime' => ini_get('session.gc_maxlifetime'),
            'path' => "/",
            'domain' => "",
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ];

        session_name(Session::$name);
        session_set_cookie_params(
            Session::$cookie['lifetime'],
            Session::$cookie['path'],
            Session::$cookie['domain'],
            Session::$cookie['secure'],
            Session::$cookie['httponly']
        );
    }

    /**
     * Starts the session and checks that it's not empty, and regenerates the id of the session
     * with a probability of 1/5
     *
     * @return boolean
     */
    public static function start()
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
    public static function get($name)
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
    public static function set($name, $value)
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
    public static function isValid()
    {
        return !Session::isExpired() && Session::isFingerprint();
    }

    /**
     * Checks wether the clients headers and the remote ip address didn't change
     *
     * @return boolean
     */
    public static function isFingerprint()
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
    public static function isExpired($ttl = 30)
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
    public static function forget()
    {
        if (session_id() === '') {
            return false;
        }
        $_SESSION = [];
        setcookie(
            Session::$name,
            '',
            time() - 42000,
            Session::$cookie['path'],
            Session::$cookie['domain'],
            Session::$cookie['secure'],
            Session::$cookie['httponly']
        );
        return session_destroy();
    }
}
