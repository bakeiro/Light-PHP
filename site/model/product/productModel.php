<?php
class productModel extends SecModel{

	public function getAllProducts(){
		$prods = Connection::query("SELECT * FROM `product`");
		return $prods;
	}

	public function getProdInfo($prod_id){
		$prod = Connection::query("SELECT * FROM `product` p inner join product_info pfo on p.product_id = pfo.product_id WHERE p.product_id = '".$prod_id."'");
	
		$prod['description'] = html_entity_decode($prod['description']);
		
		return $prod;
	}

	public function getProdsPage($offset){
		$prod = Connection::query("SELECT * FROM `product` p inner join product_info pfo on p.product_id = pfo.product_id LIMIT 4 OFFSET ".$offset);
		return $prod;
	}

}