<?php

namespace Library;

use Engine\Singleton;

/**
 * Class to interact with the debug console
 */
class Console extends Singleton
{
    protected $db_queries = [];
    protected $error = [];
    protected $warnings = [];
    protected $debug_info = [];
    protected $console_execution_traces = [];

    /**
     * Adds the SQL query to show it in the console
     *
     * @param string $query SQL query for display in the debug console
     *
     * @return void
     */
    public function addQuery($query)
    {
        $this->db_queries[] = $query;

        $this->addStackTrace($query, "query");
    }

    /**
     * Adds an error message to the debug console
     *
     * @param string $error String Errors message to display
     *
     * @return void
     */
    public function addError($error)
    {
        $this->errors[] = $error;

        $this->addStackTrace($error, "error");
    }

    /**
     * Adds a warning message to the debug console
     *
     * @param string $warning warning message to display in the debug console
     *
     * @return void
     */
    public function addWarning($warning)
    {
        $this->warnings[] = $warning;

        $this->addStackTrace($warning, "warning");
    }

    /**
     * Displays the variable passed in the parameter in the debug console, if an Array, or Object is passed
     * this output all the array/object content
     *
     * @param string|int|object|array|boolean $debug_message variable to display in the debug console
     *
     * @return void
     */
    public function addDebugInfo($debug_message)
    {
        $this->debug_info[] = $debug_message;

        $this->addStackTrace($debug_message, "debug_info");
    }

    /**
     * Adds a message to display into the debug console
     *
     * @param string $message Message to add into the debug console
     * @param string $type    Type of the message added
     *
     * @return void
     */
    public function addStackTrace($message, $type)
    {
        $this->console_execution_traces[] = array("message" => $message, "type" => $type);
    }

    /**
     * Gets all the server information, including session settings, cookie, server settings
     * date and time information and much more to display it into the debug console in a friendly way ;)
     *
     * @return string
     */
    public function getServerInfo()
    {
        $entitiesToUtf8 = function ($input) {
            // http://php.net/manual/en/function.html-entity-decode.php#104617
            return preg_replace_callback(
                "/(&#[0-9]+;)/",
                function ($m) {
                    return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
                },
                $input
            );
        };
        $plainText = function ($input) use ($entitiesToUtf8) {
            return trim(html_entity_decode($entitiesToUtf8(strip_tags($input))));
        };
        $titlePlainText = function ($input) use ($plainText) {
            return '# ' . $plainText($input);
        };

        ob_start();
        phpinfo(-1);

        $phpinfo = array('phpinfo' => array());

        // Strip everything after the <h1>Configuration</h1> tag (other h1's)
        if (!preg_match('#(.*<h1[^>]*>\s*Configuration.*)<h1#s', ob_get_clean(), $matches)) {
            return array();
        }

        $input = $matches[1];
        $matches = array();

        if (preg_match_all(
            '#(?:<h2.*?>(?:<a.*?>)?(.*?)(?:<\/a>)?<\/h2>)|' .
            '(?:<tr.*?><t[hd].*?>(.*?)\s*</t[hd]>(?:<t[hd].*?>(.*?)\s*</t[hd]>(?:<t[hd].*?>(.*?)\s*</t[hd]>)?)?</tr>)#s',
            $input,
            $matches,
            PREG_SET_ORDER
        )
        ) {
            foreach ($matches as $match) {
                $fn = strpos($match[0], '<th') === false ? $plainText : $titlePlainText;
                if (strlen($match[1])) {
                    $phpinfo[$match[1]] = array();
                } elseif (isset($match[3])) {
                    $keys1 = array_keys($phpinfo);
                    $phpinfo[end($keys1)][$fn($match[2])] = isset($match[4]) ? array($fn($match[3]), $fn($match[4])) : $fn($match[3]);
                } else {
                    $keys1 = array_keys($phpinfo);
                    $phpinfo[end($keys1)][] = $fn($match[2]);
                }
            }
        }

        $debug_info = [];
        if (isset($phpinfo["phpinfo"])) {
            $debug_info["php_info"] = $phpinfo["phpinfo"];
        }
        if (isset($phpinfo["date"])) {
            $debug_info["date"] = $phpinfo["date"];
        }
        if (isset($phpinfo["PDO"])) {
            $debug_info["PDO"] = $phpinfo["PDO"];
        }
        if (isset($phpinfo["openssl"])) {
            $debug_info["openssl"] = $phpinfo["openssl"];
        }
        if (isset($phpinfo["session"])) {
            $debug_info["session"] = $phpinfo["session"];
        }
        if (isset($phpinfo["environment"])) {
            $debug_info["environment"] = $phpinfo["Environment"];
        }
        if (isset($phpinfo["PHP Variables"])) {
            $debug_info["environment"] = $phpinfo["PHP Variables"];
        }

        return $debug_info;
    }
}
