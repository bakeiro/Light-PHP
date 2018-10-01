<?php
class indexController extends SecController{

	public function index(){
		Errors::$debug_info[] = "welcome page loaded ;)";
		Output::loadCompileTemplate("info/welcomeView",array());
	}

	public function about(){
		Output::loadCompileTemplate("info/aboutView",array());
	}

	public function welcome(){
		Output::loadCompileTemplate("welcome/welcomeView",array());
	}

	public function test(){
		$results = Connection::query("UPDATE customer SET postcode = '36215' WHERE customer_id = '1'");
		echo 'finish';
	}
}