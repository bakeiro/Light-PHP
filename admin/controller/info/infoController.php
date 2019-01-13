<?php
class infoController{

	public function dashboard(){
		Output::load("dashboard/dashboardView");
	}

	public function database(){
		Output::load("database/databaseView");
	}

}