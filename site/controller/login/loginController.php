<?php
class loginController{

	public function register(){
		Output::Load(BACK_VIEW."template/login/registerView.php");
	}

	public function login(){
		Session::set("logged", true);
		Session::set("customer_id", 0);
	}
}