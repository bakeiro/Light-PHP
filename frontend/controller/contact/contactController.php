<?php
class contactController{

	public function index(){
		Output::load(BACK_VIEW.'pags/info/contactView.php',array());
	}

}