<?php
class indexController extends SecController{

	public function index(){	
		Output::load("info/welcomeView",array());
	}

	public function about(){
		Output::load("info/aboutView",array());
	}

	public function welcome(){
		Output::load("welcome/welcomeView",array());
	}

	public function test(){
		$results = Connection::query("UPDATE customer SET postcode = '36215' WHERE customer_id = '1'");
		echo 'finish';
	}
}