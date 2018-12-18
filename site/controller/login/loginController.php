<?php
class loginController extends SecController{

	public function register(){
		Output::loadCompileTemplate("login/registerView");
	}

	
}