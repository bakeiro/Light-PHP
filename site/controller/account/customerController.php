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

		Output::load("account/infoView", $data);
	}

	public function loginPage(){
		$data = array();
		Output::load_js("jquery.min");
		Output::load("account/loginView", $data);
	}

	public function logout(){
		Session::set("logged", false);
		Session::set("customer_id", "");
		header("location: index.php?index/index"); //TODO: Add a message to show
	}

	public function checkLogin(){

		$data = array();
		$email_post = $_POST['email'];
		$pass_post = $_POST['pass'];
		
		require(MODEL.'customer/customerModel.php');
		$customer_model = new customerModel();
		$customer = $customer_model->checkLogin($email_post, $pass_post, "1");

		if($customer){
			Session::set("logged", true);
			Session::set("customer_id", 1);
			$data["success"] = true;
		}else{
			$data["error"] = "Incorrect login info";
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}

}