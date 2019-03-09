<?php

class indexController extends SecController{

	public function index(){

		Errors::$debug_info[] = "welcome page loaded ;)";

		Output::load("info/welcomeView");
	}

	public function products(){
		
		Output::add_js("jquery.min");
		Output::add_js("products/product");
		Output::add_js("products/events");
		
		Output::load("info/productsView", array());
	}

}