<?php

class Output{

    public function load($route, $data = array()){

		//TODO: Headers ??
		//TODO: Gzip ??

        ob_start();
        extract($data);
		
        require(BACK_VIEW.'common/header.php');
        require($route);
        require(BACK_VIEW.'common/footer.php');
		
		ob_end_flush();
	}

    public function gzipLoad($route,$data){
    }

	//TODO: Merge rawload and restLoad??

    public function rawload($route,$data = array()){
        //Load with no JS/CSS/Template
	}

	public function restLoad($json){

		//TODO:Headers
		//Echo output

	}
	
}