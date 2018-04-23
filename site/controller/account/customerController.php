<?php
class customerController{

	public function info(){
		$data = array();
		Output::load(VIEW."template/account/infoView.php", $data);
	}

	public function login(){
		$data = array();
		Output::load(VIEW."template/account/loginView.php", $data);
	}


}