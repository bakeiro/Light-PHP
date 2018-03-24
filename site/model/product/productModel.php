<?php
class productModel{

	public function getAllProducts(){
		$prods = Connection::makeQuery("SELECT * FROM `product`");
		return $prods;
	}

	public function getProdInfo($prod_id){
		$prod = Connection::makeQuery("SELECT * FROM `product` WHERE product_id = '".$prod_id."'");
		return $prod;
	}

}