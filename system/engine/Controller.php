<?php
class Controller{

	public function __contruct(){
		if(!Settings::get("loaded")){
			die("Error, engine not loaded");
		}
	}

}