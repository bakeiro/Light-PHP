<?php
class indexController{

	public function index(){
		
		ViewClass::load(BACK_VIEW.'pags/welcome/welcomeView.php',array());

	}

}