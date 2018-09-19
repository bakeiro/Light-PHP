<?php
class SecAdmin{

	public function checkSession(){

		require(SYSTEM . 'engine/Controller.php');
		$controller = new Controller();

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