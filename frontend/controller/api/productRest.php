<?php
class productRest{

	public function getproducts(){

		$products = [];

		header('Content-Type: application/json');
        echo json_encode($products);
	}

}