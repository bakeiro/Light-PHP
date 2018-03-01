<?php

class Output{

    public static function Load($route, $data = array()){

		//TODO: Headers ??
		//TODO: Gzip ??

        ob_start();
        extract($data);
		
        require(BACK_VIEW.'common/Header.php');
        require($route);
        require(BACK_VIEW.'common/Footer.php');
		
		ob_end_flush();
	}

    public function gZipLoad($route,$data){
    }

	//TODO: Merge rawload and restLoad??

    public function rawLoad($route,$data = array()){
        //Load with no JS/CSS/Template
	}

	public function restLoad($json){

		//TODO:Headers
		//Echo output

	}
	
}