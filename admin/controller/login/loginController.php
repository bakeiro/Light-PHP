<?php
class loginController{

	public function checkLogin(){
		
		$user_name = $_POST['name'];
		$pass = $_POST['pass'];

		//FIXME: Implement the hash in the ddbb, not a simple select
		$user = Connection::makeQuery("SELECT * FROM user WHERE `name` = '".$user_name."' AND `password` = '".$pass."' ");
	
		if(!empty($user)){
			Session::set("admin_name", $user["name"]);
			Session::set("admin_email", $user["email"]);
			$this->login();
		}else{
			$this->logout();
		}
	}
	
	public function login(){
		Session::set("logged", true);
		header("location: index.php?route=dashboard/dashboard");
	}

	public function logout(){
		Session::set("login_msg", "User incorrect");
		Session::set("logged", false);
		Output::rawload(VIEW."template/login/loginView.php");
	}

	public function loginPage(){
		Output::rawload(VIEW."template/login/loginView.php");
	}

	public function exit(){

	}
}