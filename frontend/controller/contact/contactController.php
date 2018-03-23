<?php



class contactController{

	public function index(){
		Output::load(BACK_VIEW.'pags/info/contactView.php',array());
	}

	public function send(){
		
		

	}

	public function success(){
		Output::load(BACK_VIEW.'pags/info/contactSuccessView.php',array());
	}

}