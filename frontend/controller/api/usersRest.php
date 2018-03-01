<?php
class usersRest{

	public function getUsers(){

		$users = [];

		header('Content-Type: application/json');
        echo json_encode($users);
	}

}