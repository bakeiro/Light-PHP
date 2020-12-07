<?php

namespace Library;

use Engine\Singleton;

class Util extends Singleton
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
    public function arraySortByColumn(&$arr, $col, $dir = SORT_ASC)
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
    public function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }

    /**
     * Check if the running HTTP request is started by an AJAX
     *
     * @return boolean
     */
    public function isAjaxRequest()
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
     * Escapes all the quotes/special characters
     *
     * @param string $value String to clean all the quotes, break lines and special chars
     *
     * @return string
     */
    public function escape($value)
    {
        return str_replace(array("\\", "\0", "\n", "\r", "\x1a", "'", '"'), array("\\\\", "\\0", "\\n", "\\r", "\Z", "\'", '\"'), $value);
    }

    /**
     * Deletes special characters
     *
     * @param string $text text to clean special characters
     *
     * @return string
     */
    public function preventXSS($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Generates an simple random token with an specified length
     *
     * @param int $length length of the token to generate
     *
     * @return string
     */
    public function generateSimpleToken($length)
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
    public function generateCSRFToken()
    {
        return bin2hex(random_bytes(32));
    }

    /**
     * Checks wether the CSRF token used in the POST form, matches with the CSRF token stored in the session
     *
     * @return void
     */
    public function checkPostCSRFToken()
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

    /**
     * This function acts exactly like array_walk_recursive, except that it pretends that the function
     * its calling replaces the value with its result.
     *
     * @param $array The first value of the array will be passed into $function as the primary argument
     * @param $function The function to be called on each element in the array, recursively
     * @param $parameters An optional array of the additional parameters to be appended to the function
     *
     * Example usage to alter $array to get the second, third and fourth character from each value
     *     array_walk_recursive_referential($array, "substr", array("1","3"));
     */
    public function array_walk_recursive_referential(&$array, $function, $parameters = array()) {
        $reference_function = function(&$value, $key, $userdata) {
            $parameters = array_merge(array($value), $userdata[1]);
            $value = call_user_func_array($userdata[0], $parameters);
        };
        array_walk_recursive($array, $reference_function, array($function, $parameters));
    }
}