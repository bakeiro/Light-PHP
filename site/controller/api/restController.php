<?php
class restController extends SecController{

	public function index(){

		$data = array();

		Url::$controller = Url::$restController;

		$rest_controller = new Controller();
		$output = $rest_controller->execRest();

		if($rest_controller->class !== "errorController"){
			header('Content-Type: application/json');
			echo json_encode($output);
		}
	}

}