<?php
class productController extends SecController{

	public function index(){
		Loader::load_js("products/products");
		Loader::load_css("products/products");
		Output::load("products/productsView", array());
	}

}