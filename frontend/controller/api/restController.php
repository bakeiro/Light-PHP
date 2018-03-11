<?php
class restController{

	public function index(){

		Url::$type = "controller";
		Url::$action = Url::$restController;
		$data = array();

		$rest_controller = new Controller();
		$output = $rest_controller->execRest();
		//call_user_func_array(array($controller_class,$method),$data);
		
        header('Content-Type: application/json');
        echo json_encode($output);
	}

}