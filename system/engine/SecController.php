<?php
class SecController{

	public function __contruct(){
		if(!Settings::get("loaded")){
			die("Error, engine not loaded");
		}
	}

}