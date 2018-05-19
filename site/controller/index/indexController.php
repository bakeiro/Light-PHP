<?php
class indexController{

	public function index(){	
		Output::load(VIEW.'template/info/welcomeView.php',array());
	}

	public function about(){
		Output::load(VIEW.'template/info/aboutView.php',array());
	}

	public function welcome(){
		Output::load(VIEW.'template/welcome/welcomeView.php',array());
	}

	public function test(){
		$results = Connection::query("UPDATE customer SET postcode = '36215' WHERE customer_id = '1'");
		echo 'finish';
	}
}