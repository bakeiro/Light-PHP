<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Errors{

	public static $exceptions = array();
	public static $debug_info = array();
	public static $debug_queries = array();
	public static $error_handle;

	public static function my_error_handler($errno, $errstr, $errfile, $errline) {
	
		//Get error type
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
	
		//Error message
		$error_string_html = '<b>' . $error . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
		$error_string_log = $error.' - '.$errstr.' - '.$errfile.' - '.$errline;
		$error_string_log = addslashes($error_string_log);

		//Create file if doesn't exist
		Errors::checkLogFile(SYSTEM."writable/logs/errors.log");
		Errors::checkLogFile(SYSTEM."writable/logs/notice.log");
				
		//Warning/Notice
		if($error === "Notice" || $error === "Warning"){
			Errors::$exceptions[] = array("text"=>$error_string_html, "type"=> $error);
			error_log($error_string_log."\n", 3, SYSTEM."writable/logs/notice.log");
		}
		
		//Fatal error/Unknown
		if($error === "Fatal Error" || $error === "Unknown"){
			Errors::$exceptions[] = array("text"=>$error_string_html, "type"=> $error);
			error_log($error_string_log."\n", 3, SYSTEM."writable/logs/errors.log");
		}

		//Send email
		if(Config::get("send_email_errors")){
			Error::sendEmail($error_string_html, $error);
		}
		
		return true;
	}

	public static function my_exception_handler($exception){

		//Check file
		Errors::checkLogFile(SYSTEM."writable/logs/notice.log");

		$exception_message = $exception->getMessage();

		//Write
		error_log($exception_message."\n", 3, SYSTEM."writable/logs/errors.log");
		
		//Send email
		if(Config::get("send_email_errors")){
			Error::sendEmail($exception_message, "Exception");
		}

		die("Exception happen");
	}
	
	public static function sendEmail($message, $error_type){
	
		$mail = new PHPMailer\PHPMailer\PHPMailer();
		
		$mail->IsSMTP();
		$mail->CharSet    = 'UTF-8';
		$mail->Host       = Config::get("email_host");
		$mail->isHTML();
		$mail->Port       = Config::get("email_port");
	
		$mail->Username   = Config::get("email_username");
		$mail->Password   = Config::get("email_pass");
		$mail->SMTPAuth   = true;
	
		$mail->From = Config::get("email_from");
		$mail->FromName = Config::get("email_from_name");
		
		$mail->addAddress(Config::get("email_from"));
	
		$mail->Subject = $error_type." happen";
		$mail->Body = $message;
		$mail->AltBody = $message;
	
		//Localhost workaround
		/*
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
		));
		*/

		if(!$mail->send()) {
			echo "ERROR: <br> " . $mail->ErrorInfo;
		}
	}

	public static function checkLogFile($file_name){
		if(!file_exists($file_name)){
			fopen($file_name, "w");
			fclose($file_name);
		}
	}
	
}