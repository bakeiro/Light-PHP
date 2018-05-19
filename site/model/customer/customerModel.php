<?php
class customerModel{

	public function getCustomer($email){
		$customer = Connection::query("SELECT * FROM customer WHERE `email` = '".$email."'");
		return $customer;
	}

}