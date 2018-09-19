<?php
class customerModel extends SecModel{

	public function getCustomer($email){
		$customer = Connection::query("SELECT * FROM customer WHERE `email` = '".$email."'");
		return $customer;
	}

	public function getCustomerById($id){
		$customer = Connection::query("SELECT * FROM customer WHERE `id` = '".$id."'");
		return $customer;
	}

}