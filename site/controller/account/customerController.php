<?php
class customerController extends SecController{

	public function info(){
		
		require(MODEL.'customer/customerModel.php');
		$customer_model = new customerModel();
		
		$customer_info = $customer_model->getCustomerById(Session::get("customer_id"));
		
		$data = array();
		$data["customer_id"] = Session::get("customer_id");
		$data["first_name"] = $customer_info["first_name"];
		$data["last_name"] = $customer_info["last_name"];

		Output::loadCompileTemplate("account/infoView", $data);
	}

	public function login(){
		$data = array();
		Output::loadCompileTemplate("account/loginView", $data);
	}

	public function logout(){
		Session::set("logged", false);
		Session::set("customer_id", "");
		header("location: index.php?index/index"); //TODO: Add a message to show
	}


}