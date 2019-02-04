<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class indexController extends SecController{

	public function index(){

		Errors::$debug_info[] = "welcome page loaded ;)";

		Output::load("info/welcomeView");
	}

	public function products(){
		
		Output::load_js("jquery.min");
		Output::load_js("products/product");
		Output::load_js("products/events");
		
		Output::load("info/productsView", array());
	}

}