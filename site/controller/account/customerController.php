<?php
class customerController{

	public function info(){
		//Get info from the logged account
	}

	public function login(){
		$data = array();
		Output::load(VIEW."template/account/loginView.php", $data);
	}


}