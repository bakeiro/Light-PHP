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

	public function loginPage(){
		$data = array();
		Output::loadCompileTemplate("account/loginView", $data);
	}

	public function logout(){
		Session::set("logged", false);
		Session::set("customer_id", "");
		header("location: index.php?index/index"); //TODO: Add a message to show
	}

	public function checkLogin(){

		$email_post = $_POST['email'];
		$pass_post = $_POST['pass'];

		require(MODEL."customer/customerModel.php");
		$customer_model = new customerModel();

		$customer = $customer_model->getCustomer($email_post);
		
		$errors = [];
		if($customer){
			if($customer['password'] !== $pass_post){
				$errors[] = array("msg"=>"Incorrect pass", "field" =>"pass");
			}
		}else{
			$errors[] = array("msg"=>"Email not found", "field" =>"email");
		}

		$data = array();
		$data['errors'] = $errors;

		if(count($errors) === 0){
			if($customer['password'] === $pass_post){

				$this->login();

				$data["success"] = true;
			}
		}

		return $data;
	}

	public function login(){
		Session::set("logged", true);
		Session::set("customer_id", 1);
	}

}