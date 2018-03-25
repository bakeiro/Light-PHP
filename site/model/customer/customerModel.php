<?php
class customerModel{

	public function getCustomer($email){
		$customer = Connection::makeQuery("SELECT * FROM customer WHERE `email` = '".$email."'");
		return $customer;
	}

}