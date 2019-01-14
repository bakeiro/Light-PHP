<?php
class infoController{

	public function products(){

		$data = array();
		$data["title"] = "Products";
		$data["total_products"] = Database::query("SELECT count(`id`) FROM product")["count(`id`)"];

		Output::load("info/productsView", $data);
	}

	public function users(){

		$data = array();
		$data["title"] = "Users";
		$data["total_users"] = Database::query("SELECT count(`id`) FROM user")["count(`id`)"];

		Output::load("info/usersView", $data);
	}

}