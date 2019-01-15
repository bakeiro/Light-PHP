<?php
class infoController{

	public function dashboard(){

		$data = array();
		$data["title"] = "Welcome";
		Output::load("info/dashboardView", $data);
	}

	public function products(){

		$data = array();
		$data["title"] = "Products";
		$data["total_products"] = Database::query("SELECT count(`id`) FROM product")["count(`id`)"];

		Output::rawLoad("info/productsView", $data);
	}

	public function users(){

		$data = array();
		$data["title"] = "Users";
		$data["total_users"] = Database::query("SELECT count(`id`) FROM user")["count(`id`)"];

		Output::rawLoad("info/usersView", $data);
	}

}