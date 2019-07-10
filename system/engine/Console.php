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
}
