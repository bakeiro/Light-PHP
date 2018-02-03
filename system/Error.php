<?php

class ErrorClass{

	public $warnings = array();
	public $errors = array();
	private $enviroment;

	function error_handler($errno, $errstr, $errfile, $errline) {
    
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
	
		$error_string_html = '<b>' . $error . '</b>: ' . $errstr . ' in <b>' . $errfile . '</b> on line <b>' . $errline . '</b>';
		$error_string_log = $error.' - '.$errstr.' - '.$errfile.' - '.$errline;
		
		$this->warnings[] = $error_string_html;
	
		if($error === "Notice"){
			error_log( addslashes($error_string_log)."\n", 3, "system/errors/backend-notice.log");
		}
		
		if($error === "Warning" || $error === "Fatal Error" || $error === "Unknown"){
			
			$this->errors[] = $error_string_log;
			error_log( addslashes($error_string_log)."\n", 3, "system/errors/backend-errors.log");
	
			if($GLOBALS['settings']['error_handle'] !== "developing"){
				sendEmail($error_string_html);
			}
		}
	
		//TODO: Add the errors and warning in the DDBB
		//TODO: 	Use woops library
		
		return true;
	}

	function test(){
		return 10;
	}
	
	function sendEmail($message){
	
		require_once(BACK_SYSTEM.'modules/Mail/PHPMailerAutoload.php');
		
		$mail = new PHPMailer();
		
		$mail->IsSMTP();
		$mail->CharSet    = 'UTF-8';
		$mail->Host       = "smtp.gmail.com";
		$mail->isHTML();
		$mail->Port       = 587;
	
		$mail->Username   = "davixt3@gmail.com";
		$mail->Password   = "bertolas";
		$mail->SMTPAuth   = true;
	
		$mail->From = "davixt3@gmail.com";
		$mail->FromName = 'davixt3@gmail.com';
		
		$mail->addAddress("davidbaqueiro@outlook.com");
	
		$mail->Subject = "Error in backend";
		$mail->Body = $message;
		$mail->AltBody = $message;
	
		//FIXME: localhost workaround
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
		));
	
		if(!$mail->send()) {
			echo "ERROR: <br> " . $mail->ErrorInfo;
		}
	
	}

}