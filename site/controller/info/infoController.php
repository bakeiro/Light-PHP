<?php

class infoController{

	public function contact(){

	}

	public function about(){

	}

	public function welcome(){
		Output::load(BACK_VIEW.'template/welcome/welcomeView.php',array());
	}

	
}