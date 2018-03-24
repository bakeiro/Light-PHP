<?php
class productModel{

	public function getAllProducts(){
		$prods = Connection::makeQuery("SELECT * FROM `product`");
		return $prods;
	}

	public function getProdInfo($prod_id){
		$prods = Connection::makeQuery("SELECT * FROM `product` p inner join product_info pfo on p.product_id = pfo.product_id WHERE p.product_id = '".$prod_id."'");
		
		foreach($prods as &$prod){
			$prod['description'] = html_entity_decode($prod['description']);
		}
		unset($prod);
		
		return $prods;
	}

	public function getProdsPage($offset){
		$prod = Connection::makeQuery("SELECT * FROM `product` p inner join product_info pfo on p.product_id = pfo.product_id LIMIT 4 OFFSET ".$offset);
		return $prod;
	}

}