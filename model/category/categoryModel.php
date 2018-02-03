<?php
class categoryModel{

	public function getProdsCategory($category_id){
		$prods = Connection::makeQuery("SELECT group_concat(product_id) as prods FROM product_to_category WHERE category_id = '".$category_id."'");
		return $prods;
	}

}