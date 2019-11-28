<?php

class Session
{
    public static $name;
    public static $cookie;

    public static function init($cookie = [])
    {
        //Session handler
        $session_handler = new SessionSecureHandler();
        session_set_save_handler($session_handler, true);

        //Variables
        Session::$cookie = $cookie;
        Session::$name = Config::get("session_name");
        Session::$cookie += [
            'lifetime' => ini_get('session.gc_maxlifetime'),
            'path' => "/",
            'domain' => "",
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
        ];

        //Setup
        session_name(Session::$name);
        session_set_cookie_params(
            Session::$cookie['lifetime'],
            Session::$cookie['path'],
            Session::$cookie['domain'],
            Session::$cookie['secure'],
            Session::$cookie['httponly']
        );
    }

    public static function start()
    {
        if (session_id() === '') {
            if (session_start()) {
                return mt_rand(0, 4) === 0 ? session_regenerate_id() : true; // 1/5
            }
        }
        return false;
    }

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

    public static function isValid()
    {
        return !Session::isExpired() && Session::isFingerprint();
    }

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
