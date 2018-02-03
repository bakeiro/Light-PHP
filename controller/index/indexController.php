<?php
class indexController{

	public function index(){
		
		$GLOBALS['App']['view']->load(BACK_VIEW.'pags/welcome/welcomeView.php',array());

	}

}