<?php

namespace Library;

class Util
{
    /**
     * Sort one array by one column
     *
     * @param array     $arr Array to sort
     * @param array|int $col column name to sort the array by
     * @param array|int $dir sort options
     *
     * @return array
     */
    public static function arraySortByColumn(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();

        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }

    /**
     * Convert the size number into a human readable value
     *
     * @param int $size size number of memory to convert into a readable value
     *
     * @return string
     */
    public static function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

    /**
     * Check if the running HTTP request is started by an AJAX
     *
     * @return boolean
     */
    public static function isAjaxRequest()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            return true;
        }
        return false;
    }

    /**
     * Get client's IP address - if proxy lets get the REAL IP address
     *
     * @return string
     */
    public function ipAddress()
    {
        if (!empty($_SERVER['REMOTE_ADDR']) and !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = '0.0.0.0';
        }
        return $ip;
    }

    /**
     * Escapes input fields from cross site scripting attacks
     * 
     * @param string $value  String to clean all the tags, and prevent running        * javascript script attacks and html tags
     * 
     * @return string
     */
    public static  function xssEscape(&$value)
    {
        return $value = strip_tags($value);
    }

    /**
     * Escapes the white spaces and other predefined characters from the left and right sides of a string.
     * 
     * @param string $value String to clean all white spaces and other predefined characters from the left and right 
     * sides of a string.
     * 
     * @return string
     */
    public static function trimEscape(&$value)
    {
        return $value = trim($value);
    }

    /**
     * Escapes all the quotes/special characters
     *
     * @param string $value String to clean all the quotes, break lines and special chars
     *
     * @return string
     */
    public static function escape($value)
    {
        return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
    }

    /**
     * Clean $_POST and $_GET values
     *
     * @return void
     */
    public static function cleanInput()
    {
        array_walk_recursive($_GET, array("Util", "trimEscape"));
        array_walk_recursive($_GET, array("Util", "xssEscape"));
        array_walk_recursive($_GET, array("Util", "escape"));

        array_walk_recursive($_POST, array("Util", "trimEscape"));
        array_walk_recursive($_POST, array("Util", "xssEscape"));
        array_walk_recursive($_POST, array("Util", "escape"));
    }

    /**
     * Deletes special characters
     *
     * @param string $text text to clean special characters
     *
     * @return string
     */
    public static function sanitizeText($text)
    {
        return trim(htmlentities(preg_replace("/([^a-z0-9!@#$%^&*()_\-+\]\[{}\s\n<>:\\/\.,\?;'\"]+)/i", '', $text), ENT_QUOTES, 'UTF-8'));
    }

    /**
     * Generates an simple random token with an specified length
     *
     * @param int $length length of the token to generate
     *
     * @return string
     */
    public static function generateSimpleToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }

    /**
     * Generates a random token for use in the CSRF token (this is used to check the POST forms integrity)
     *
     * @return string
     */
    public static function generateCSRFToken()
    {
        return bin2hex(random_bytes(32));
    }

    /**
     * Checks wether the CSRF token used in the POST form, matches with the CSRF token stored in the session
     *
     * @return void
     */
    public static function checkPostCSRFToken()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["csrf_token"])) {
                if (!hash_equals(Session::get("csrf_token"), $_POST["csrf_token"])) {
                    throw new \Exception('The CSRF token doesn\'t match!');
                }
            } else {
                throw new \Exception('The CSRF token was not defined');
            }
        }
    }
}
