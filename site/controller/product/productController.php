<?php
class productController{

	public function index(){
		Loader::load_js("products/products");
		Loader::load_css("products/products");
		Output::load(VIEW.'template/products/productsView.php', array());
	}

}