<?php
class productModel{

	public function getAllProducts(){
		$prods = Connection::makeQuery("SELECT * FROM `product`");
		return $prods;
	}

	public function getProdInfo($prod_id){
		$prod = Connection::makeQuery("SELECT * FROM `product` p inner join product_info pfo on o.product_id = pfo.product_id WHERE p.product_id = '".$prod_id."'");
		return $prod;
	}

	public function getProdsPage($offset){
		$prod = Connection::makeQuery("SELECT * FROM `product` p inner join product_info pfo on p.product_id = pfo.product_id LIMIT 4 OFFSET ".$offset);
		return $prod;
	}

}