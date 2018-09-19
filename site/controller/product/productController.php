<?php
class productController extends SecController{

	public function index(){
		Output::load_js("products/products");
		Output::load_css("products/products");
		Output::loadCompileTemplate("products/productsView", array());
	}

}