<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class contactController{

	public function index(){
		Output::load(VIEW.'template/info/contactView.php',array());
	}

	public function send(){
		
		require(SYSTEM."libraries/vendor/autoload.php");

		//TODO: Not yet finish

		$mail = new PHPMailer(true);
		try {

			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'smtp1.example.com;smtp2.example.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'user@example.com';
			$mail->Password = 'secret';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			//Recipients
			$mail->setFrom('from@example.com', 'Mailer');
			$mail->addAddress('joe@example.net', 'Joe User');
			$mail->addAddress('ellen@example.com');
			$mail->addReplyTo('info@example.com', 'Information');
			$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com');

			//Attachments
			$mail->addAttachment('/var/tmp/file.tar.gz');
			$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo 'Message has been sent';

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

	}

	public function success(){
		Output::load(VIEW.'template/info/contactSuccessView.php',array());
	}

}