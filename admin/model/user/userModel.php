<?php

class userModel{

	public function checkLogin($email, $pass, $role){

		$user_email = strtolower($email);

		$params = array(":email"=>$email, ":pass"=>$pass, ":user_role"=>$role);
		$customer_query = Database::query("SELECT * FROM `user` WHERE LOWER(`email`) = :email AND `password` = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(:pass))))) AND `role` = :user_role", $params);

		return $customer_query;
	}

}