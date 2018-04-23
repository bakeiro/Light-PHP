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

	public function logout(){
		Session::set("logged", false);
		Session::set("customer_id", "");
		header("location: index.php?index/index"); //TODO: Add a message to show
	}


}