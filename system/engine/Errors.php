<?php
// phpcs:disable
use Library\Console;

/**
 * Error handling class, define callbacks to execute and handle warnings, errors, exceptions and unknown errors
 */
class Errors
{
    public $error_handle;

    public function myErrorHandler($errno, $error_string, $error_file, $error_line)
    {
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

        $error_string_log = " *" . $error . "* " . $error_string . "\n - file: " . $error_file . "\n - on line: " . $error_line. "\n\n";
        $error_string_log = addslashes($error_string_log);

        if ($error === "Warning") {
            $this->warningHandler($error_string_log);
        }

        if ($error === "Notice") {
            $this->noticeHandler($error_string_log);
        }

        if ($error === "Fatal Error") {
            $this->errorHandler($error_string_log);
        }

        if ($error === "Unknown") {
            $this->noticeHandler($error_string_log);
        }

        return true;
    }

    public function myExceptionHandler($exception)
    {
        $exception_message = $exception->getMessage();

        Console::addError($exception_message);

        $this->checkLogFile(SYSTEM . "writable/logs/errors.log");
        error_log($exception_message."\n", 3, SYSTEM . "writable/logs/errors.log");

        die($exception_message);
    }

    public function noticeHandler($error_string)
    {
        Console::addWarning($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/notice.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/notice.log");
    }

    public function warningHandler($error_string)
    {
        Console::addWarning($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/warnings.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/warnings.log");
    }

    public function errorHandler($error_string)
    {
        Console::addError($error_string);
        $this->checkLogFile(SYSTEM . "writable/writable/logs/errors.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/errors.log");
    }

    public function unknownErrorHandler($error_string)
    {
        Console::addError($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/unknown-errors.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/unknown-errors.log");
    }

    public function checkLogFile($file_name)
    {
        if (!file_exists($file_name)) {
            $fileResource = fopen($file_name, "w");
            fclose($fileResource);
        }
    }
}
