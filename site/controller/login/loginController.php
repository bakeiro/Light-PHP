<?php
class loginController extends SecController{

	public function register(){
		Output::loadCompileTemplate("login/registerView");
	}

	public function login(){
		Session::set("logged", true);
		Session::set("customer_id", 1);
	}
}