<?php
class restController{

	public function index(){

		$data = array();

		Url::$action = Url::$restController;

		$rest_controller = new Controller();
		$output = $rest_controller->execRest();
		
        header('Content-Type: application/json');
        echo json_encode($output);
	}

}