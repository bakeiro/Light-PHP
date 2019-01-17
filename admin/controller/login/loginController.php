<?php
class loginController{

	public function checkLogin(){
		
		$user_email = $_POST['email'];
		$pass = $_POST['pass'];
		$role = "admin_master";

		require_once(MODEL."user/userModel.php");
		$user_model = new userModel();

		$user = $user_model->checkLogin($user_email, $pass, $role);
	
		if($user){
			
			Session::set("admin_name", $user["first_name"]);
			Session::set("admin_email", $user["email"]);
			Session::set("admin_logged", true);

			header("location: index.php?route=info/info/dashboard");
			
		}else{

			Session::set("admin_logged", false);
			Session::set("login_msg", "Incorrect password");
			header("location: index.php");
		}
	}

	public function logout(){
		
		Session::$handler->forget();
				
		Output::rawload("login/loginView");
	}

	public function loginPage(){
		Output::rawload("login/loginView");
	}

}