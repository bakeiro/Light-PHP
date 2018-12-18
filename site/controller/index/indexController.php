<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class indexController extends SecController{

	public function index(){
		Errors::$debug_info[] = "welcome page loaded ;)";
		Output::loadCompileTemplate("info/welcomeView",array());
	}

	public function contactForm(){
		Output::loadCompileTemplate("info/contactView",array());
	}

	public function contactSend(){

		try {

			//POST
			$email_target = $_POST["email_target"];
			$email_name = $_POST["first_name"]." ".$_POST["last_name"];
			$email_body = $_POST["text"];
			
			//Init
			$mail = new PHPMailer(true);
			$mail->isSMTP();
			$mail->Host = Config::get("email_host");
			$mail->SMTPAuth = true;
			$mail->Username = Config::get("email_username");
			$mail->Password = Config::get("email_pass");
			$mail->SMTPSecure = 'tls';
			$mail->Port = Config::get("email_port");

			//Recipients
			$mail->setFrom(Config::get("email_from"), Config::get("email_from_name"));
			$mail->addAddress($email_target);

			//Content
			$mail->isHTML(true);
			$mail->Subject = "Contact message form";
			$mail->Body    = $email_name. "<br>". $email_body;
			$mail->AltBody = $email_name. "    ". $email_body;
			$mail->send();

			Output::loadCompileTemplate("info/contactSuccessView",array());

		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}

	public function products(){
		Output::load_js("products/products");
		Output::load_css("products/products");
		Output::loadCompileTemplate("products/productsView", array());
	}

}