<?php
class infoController{

	public function dashboard(){
		Output::load("info/dashboardView");
	}

	public function database(){
		Output::load("info/databaseView");
	}

}