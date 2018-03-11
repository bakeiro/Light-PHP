<?php
class productController{

	public function getProdPage($page = 0){

		$results_per_page = 4;
		$offset = $page * $results_per_page;

		$products = array();
		$products = Connection::makeQuery("SELECT * FROM `product` LIMIT 4 OFFSET ".$offset);

		return $products;
	}

}