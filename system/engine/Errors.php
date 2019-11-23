<?php

class Errors
{
    public static $error_handle;

    public static function myErrorHandler($errno, $errstr, $errfile, $errline)
    {
        // Get error type
        switch ($errno) {
            case E_NOTICE:
            case E_USER_NOTICE:
                $error = 'Notice';
                break;
            case E_WARNING:
            case E_USER_WARNING:
                $error = 'Warning';
                break;
            case E_ERROR:
            case E_USER_ERROR:
                $error = 'Fatal Error';
                break;
            default:
                $error = 'Unknown';
                break;
        }

        // Message
        $error_string_html = '<b>' . $error . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
        $error_string_log = $error . ' - ' . $errstr . ' - ' . $errfile . ' - ' . $errline;
        $error_string_log = addslashes($error_string_log);

        // Check file
        Errors::checkLogFile(SYSTEM . "writable/logs/errors.log");
        Errors::checkLogFile(SYSTEM . "writable/logs/notice.log");

        // Warning/Notice
        if ($error === "Notice" || $error === "Warning") {
            error_log($error_string_log . "\n", 3, SYSTEM . "writable/logs/notice.log");
            Console::addWarning($error_string_html);
        }

        // Fatal error/Unknown
        if ($error === "Fatal Error" || $error === "Unknown") {
            error_log($error_string_log . "\n", 3, SYSTEM . "writable/logs/errors.log");
            Console::addError($error_string_html);
        }

        // Email
        if (Config::get("send_email_errors")) {
            Error::sendEmail($error_string_html, $error);
        }

        return true;
    }

    public static function myExceptionHandler($exception)
    {
        // Check file
        Errors::checkLogFile(SYSTEM . "writable/logs/notice.log");

        $exception_message = $exception->getMessage();

        error_log($exception_message . "\n", 3, SYSTEM . "writable/logs/errors.log");

        // Send email
        if (Config::get("send_email_errors")) {
            //  TODO: Here I encourage to implement a send email function with the exception in case
        }

        die("Exception happen");
    }

    public static function checkLogFile($file_name)
    {
        if (!file_exists($file_name)) {
            $fileResource = fopen($file_name, "w");
            fclose($fileResource);
        }
    }

}
