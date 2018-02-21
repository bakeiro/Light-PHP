<?php
class indexController extends App{

	public function index(){	
		$this->view->load(BACK_VIEW.'pags/welcome/welcomeView.php',array());
	}
}