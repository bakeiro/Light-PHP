<?php
class indexController{

	public function index(){	
		Output::load(BACK_VIEW.'template/info/welcomeView.php',array());
	}

	public function about(){
		Output::load(BACK_VIEW.'template/info/aboutView.php',array());
	}
}