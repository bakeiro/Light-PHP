<?php
class loginController{

	public function checkLogin(){
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		//TODO: Check
	}

	public function login(){
		Session::set("logged", true);
	}

	public function logout(){
		Session::set("logged", false);
	}

	public function loginPage(){
		Output::load(VIEW."template/login/loginView.php");
	}

}