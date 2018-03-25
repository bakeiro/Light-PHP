<?php
class loginController{

	public function register(){
		Output::Load(VIEW."template/login/registerView.php");
	}

	public function login(){
		Session::set("logged", true);
		Session::set("customer_id", 1);
	}
}