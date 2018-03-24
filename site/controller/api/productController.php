<?php
class productController{

	public function getProdPage($page = 0){

		$results_per_page = 4;
		$offset = $page * $results_per_page;

		Loader::load_model("product/product");
		$product_model = new productModel();

		$products = array();
		$products = $product_model->getProdsPage($offset);

		return $products;
	}

}