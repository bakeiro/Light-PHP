<?php

class Model{

	public function Model(){
		if(!Settings::get("loaded")){
			die("Error, engine not loaded");
		}
	}

}