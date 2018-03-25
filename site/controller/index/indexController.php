<?php
class indexController{

	public function index(){	
		Output::load(BACK_VIEW.'template/info/welcomeView.php',array());
	}

	public function about(){
		Output::load(BACK_VIEW.'template/info/aboutView.php',array());
	}

	public function welcome(){
		Output::load(BACK_VIEW.'template/welcome/welcomeView.php',array());
	}
}