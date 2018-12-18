<?php
class loginController{

	public function checkLogin(){
		
		$user_name = $_POST['name'];
		$pass = $_POST['pass'];

		//FIXME: Implement the hash in the ddbb, not a simple select
		$user = Database::query("SELECT * FROM user WHERE `name` = '".$user_name."' AND `password` = '".$pass."' ");
	
		if(!empty($user)){
			Session::set("admin_name", $user["name"]);
			Session::set("admin_email", $user["email"]);
			$this->login();
		}else{
			Session::set("login_msg", "Incorrect password");
			header("location: index.php");
		}
	}
	
	public function login(){
		Session::set("logged", true);
		header("location: index.php?route=dashboard/dashboard");
	}

	public function logout(){
		Session::set("login_msg", "Logged out");
		Session::set("logged", false);
		Output::rawload("login/loginView");
	}

	public function loginPage(){
		Output::rawload("login/loginView");
	}

	public function exit(){

	}
}