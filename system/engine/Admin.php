<?php
class Admin{

	public function checkSession(){

		require(SYSTEM . 'engine/EngController.php');
		$controller = new EngController();

		if(!Session::get("logged")){
			if($controller->method !== "checkLogin"){
				$controller->method = "loginPage";
				$controller->file = CONTROLLER."login/loginController.php";
				$controller->class = "loginController";
			}
		}

		return $controller;
	}

}