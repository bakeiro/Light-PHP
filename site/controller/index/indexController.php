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
}