<?php
class indexController extends App{


	public function index(){
		
		$cont = 0;
		$cont ++;
		$this->view->load(BACK_VIEW.'pags/welcome/welcomeView.php',array());

	}

}