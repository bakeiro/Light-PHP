<?php

class Console
{
    public static function addQuery($query)
    {
        $db_queries = Config::get("console_db_queries");
        $db_queries[] = $query;
        Config::set("console_db_queries", $db_queries);

        Console::addStackTrace($query, "query");
    }

    public static function addError($error)
    {
        $errors = Config::get("console_errors");
        $errors[] = $error;
        Config::set("console_errors", $errors);

        Console::addStackTrace($error, "error");
    }

    public static function addWarning($warning)
    {
        $warnings = Config::get("console_warnings");
        $warnings[] = $warning;
        Config::set("console_warnings", $warnings);

        Console::addStackTrace($warning, "warning");
    }

    public static function addDebugInfo($debug_message)
    {
        $debug_info = Config::get("console_debug_info");
        $debug_info[] = $debug_message;
        Config::set("console_debug_info", $debug_info);

        Console::addStackTrace($debug_message, "debug_info");
    }

    public static function addStackTrace($message, $type)
    {
        $console_execution_traces = Config::get("console_execution_trace");
        $console_execution_traces[] = array("message" => $message, "type" => $type);
        Config::set("console_execution_trace", $console_execution_traces);
    }

    public static function getServerInfo()
    {
        function phpinfo2array()
        {

            $entitiesToUtf8 = function ($input) {
                // http://php.net/manual/en/function.html-entity-decode.php#104617
                return preg_replace_callback("/(&#[0-9]+;)/", function ($m) {return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");}, $input);
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
            )) {
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

            return $phpinfo;
        }

        $important_info = phpinfo2array();
        $debug_info = [];
        if (isset($important_info["phpinfo"])) {
            $debug_info["php_info"] = $important_info["phpinfo"];
        }
        if (isset($important_info["date"])) {
            $debug_info["date"] = $important_info["date"];
        }
        if (isset($important_info["PDO"])) {
            $debug_info["PDO"] = $important_info["PDO"];
        }
        if (isset($important_info["openssl"])) {
            $debug_info["openssl"] = $important_info["openssl"];
        }
        if (isset($important_info["session"])) {
            $debug_info["session"] = $important_info["session"];
        }
        if (isset($important_info["environment"])) {
            $debug_info["environment"] = $important_info["Environment"];
        }
        if (isset($important_info["PHP Variables"])) {
            $debug_info["environment"] = $important_info["PHP Variables"];
        }
        return $debug_info;
    }
}
