<?php
class loginController{

	public function checkLogin(){
		
		$user_name = $_POST['name'];
		$pass = $_POST['pass'];

		//FIXME: Implement the hash in the ddbb, not a simple select
		$user = Connection::makeQuery("SELECT * FROM user WHERE `name` = '".$user_name."' AND `password` = '".$pass."' ");
	
		if(!empty($user)){

			$this->login();
			header("location: index.php?route=dashboard/dashboard");
		}else{

			//$this->logout();
			Session::set("logged", false);
			Output::load(VIEW."template/login/loginView.php");
		}
	}

	public function login(){
		Session::set("logged", true);
	}

	public function logout(){

		$cont = 5;
		$cont /= 0;
		//throw new Exception("test"); //FIXME: why stops the execution??
		
		Session::set("logged", false);
		Output::load(VIEW."template/login/loginView.php");
	}

	public function loginPage(){
		Output::load(VIEW."template/login/loginView.php");
	}

	public function exit(){

	}
}