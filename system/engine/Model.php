<?php

class Model{

	public function __construct(){
		if(!Settings::get("loaded")){
			die("Error, engine not loaded");
		}
	}

}