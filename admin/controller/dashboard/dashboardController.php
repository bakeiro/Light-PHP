<?php
class dashboardController{

	public function index(){

		//TODO: Do here the main page

		$data = array();
		Output::load(VIEW."template/dashboard/dashboardView.php", $data);

	}

}