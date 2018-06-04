<?php
class customerModel extends Model{

	public function getCustomer($email){
		$customer = Connection::query("SELECT * FROM customer WHERE `email` = '".$email."'");
		return $customer;
	}

}