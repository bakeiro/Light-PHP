<?php
class dashboardController{

	public function index(){

		//TODO: Do here the main page

		$data = array();
		Output::load("dashboard/dashboardView", $data);

	}

}