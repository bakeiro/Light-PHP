<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class contactController extends SecController{

	public function index(){
		Output::load("info/contactView",array());
	}

	public function send(){
		
		require(SYSTEM."libraries/vendor/autoload.php");

		//TODO: Not yet finish
		$mail = new PHPMailer(true);
		
		try {

			//$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = Settings::get("email_host");
			$mail->SMTPAuth = true;
			$mail->Username = Settings::get("email_username");
			$mail->Password = Settings::get("email_pass");
			$mail->SMTPSecure = 'tls';
			$mail->Port = Settings::get("email_port");

			//Recipients
			$mail->setFrom(Settings::get("email_from"), Settings::get("email_from_name"));
			$mail->addAddress('ellen@example.com');
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			echo 'Message has been sent';

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

	}

	public function success(){
		Output::load("info/contactSuccessView",array());
	}

}