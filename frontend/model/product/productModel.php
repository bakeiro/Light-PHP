<?php
class categoryModel{

	public function getProds(){
		$prods = Connection::makeQuery("SELECT * FROM `product`");
		return $prods;
	}

}