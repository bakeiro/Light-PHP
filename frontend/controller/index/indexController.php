<?php
class indexController{

	public function index(){	
		Output::load(BACK_VIEW.'pags/info/welcomeView.php',array());
	}

	public function about(){
		Output::load(BACK_VIEW.'pags/info/aboutView.php',array());
	}
}