<?php
class loginController{

	public function register(){
		Output::load("login/registerView");
	}

	public function login(){
		Session::set("logged", true);
		Session::set("customer_id", 1);
	}
}