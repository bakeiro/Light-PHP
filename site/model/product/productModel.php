<?php
class productModel extends SecModel{

	public function getAllProducts(){
		$prods = Database::query("SELECT * FROM `product`");
		return $prods;
	}

	public function getProdInfo($prod_id){
		$prod = Database::query("SELECT * FROM `product` p inner join product_info pfo on p.id = pfo.id WHERE p.id = '".$prod_id."'");
	
		$prod['description'] = html_entity_decode($prod['description']);
		
		return $prod;
	}

	public function getProdsPage($offset){
		$prod = Database::query("SELECT * FROM `product` p inner join product_info pfo on p.id = pfo.id LIMIT 4 OFFSET ".$offset);
		return $prod;
	}

}