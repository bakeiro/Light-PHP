<?php
class indexController{

	public function index(){	
		Output::load(BACK_VIEW.'pags/welcome/welcomeView.php',array());
	}
}