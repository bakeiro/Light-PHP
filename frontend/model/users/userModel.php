<?php
class categoryModel{

	public function getUsers(){
		$users = Connection::makeQuery("SELECT * FROM `user`");
		return $users;
	}

}