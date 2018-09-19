<?php

class SecModel{

	public function __construct(){
		if(!Settings::get("loaded")){
			die("Error, engine not loaded");
		}
	}

}