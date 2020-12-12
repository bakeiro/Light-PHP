<?php

// phpcs:disable PSR1.Classes.ClassDeclaration

namespace Library;

/**
 * Error handling class, define callbacks to execute when warnings, errors, exceptions and unknown errors happen
 */
class Logger
{
    public $error_handle;

    private $_error_log_path;
    private $_notice_log_path;
    private $_warning_log_path;
    private $_unknown_errors_log_path;
    private $_console;

    /**
     * Sets the Logger constructor
     */
    public function __construct($error_log_path, $notice_log_path, $warning_log_path, $unknown_errors_log_path, $console)
    {
        $this->_error_log_path = $error_log_path;
        $this->_notice_log_path = $notice_log_path;
        $this->_warning_log_path = $warning_log_path;
        $this->_unknown_errors_log_path = $unknown_errors_log_path;
        $this->_console = $console;
    }

    /**
     * Error handler, parses the error, and wether it's a warning, exception, notice or something else, executes the
     * correct callback
     *
     * @param string $errno        Error name
     * @param string $error_string Error description
     * @param string $error_file   File of the error
     * @param string $error_line   Line of the error
     */
    public function myErrorHandler(string $errno, string $error_string, string $error_file, string $error_line): void
    {
        $error = "Unknown";
        if ($errno === E_NOTICE || $errno === E_USER_NOTICE) {
            $error = 'Notice';
        }
        if ($errno === E_WARNING || $errno === E_USER_WARNING) {
            $error = 'Warning';
        }
        if ($errno === E_ERROR || $errno === E_USER_ERROR) {
            $error = 'Fatal Error';
        }

        $error_string_log = " *" . $error . "* " . $error_string . "\n - file: " . $error_file . "\n - on line: " . $error_line . "\n\n";
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
    }

    /**
     * Exception callback
     *
     * @param $exception Exception message
     */
    public function myExceptionHandler($exception): void
    {
        $exception_message = $exception->getMessage();

        $this->_console->addError($exception_message);

        $this->checkLogFile($this->_error_log_path);
        error_log($exception_message . "\n", 3, $this->_error_log_path);

        die($exception_message);
    }

    /**
     * Notice callback
     *
     * @param string $error_string Notice message
     */
    public function noticeHandler(string $error_string): void
    {
        $this->_console->addWarning($error_string);
        $this->checkLogFile($this->_notice_log_path);
        error_log($error_string . "\n", 3, $this->_notice_log_path);
    }

    /**
     * Warning handler
     *
     * @param string $error_string Warning message
     */
    public function warningHandler(string $error_string): void
    {
        $this->_console->addWarning($error_string);
        $this->checkLogFile($this->_warning_log_path);
        error_log($error_string . "\n", 3, $this->_warning_log_path);
    }

    /**
     * Error handler
     *
     * @param string $error_string Error message
     */
    public function errorHandler(string $error_string): void
    {
        $this->_console->addError($error_string);
        $this->checkLogFile($this->_error_log_path);
        error_log($error_string . "\n", 3, $this->_error_log_path);
    }

    /**
     * Unknown Error handler
     *
     * @param string $error_string Unknown error message
     */
    public function unknownErrorHandler(string $error_string): void
    {
        $this->_console->addError($error_string);
        $this->checkLogFile($this->_unknown_errors_log_path);
        error_log($error_string . "\n", 3, $this->_unknown_errors_log_path);
    }

    /**
     * Checks, wether the file passed in the argument exist, if not, creates it
     *
     * @param string $file_name path of the log file
     */
    public function checkLogFile(string $file_name): void
    {
        if (!file_exists($file_name)) {
            $fileResource = fopen($file_name, "w");
            fclose($fileResource);
        }
    }
}
