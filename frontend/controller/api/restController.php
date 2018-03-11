<?php
class restController{

	public function index(){

		Url::$type = "controller";
		Url::$action = Url::$restController;
		$data = array();

		$rest_controller = new Controller();
		$output = $rest_controller->exec_function();
		
        header('Content-Type: application/json');
        echo json_encode($output);
	}

}