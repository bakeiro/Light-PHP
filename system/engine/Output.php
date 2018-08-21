<?php

class Output{

    public static function Load($route, $data = array()){

		//TODO: Headers ??
		//TODO: Gzip ??

        ob_start();
        extract($data);
		
        require(VIEW.'template/common/Header.php');
        require(VIEW.'template/'.$route.'.php');
        require(VIEW.'template/common/Footer.php');
		
		ob_end_flush();
	}

    public function gZipLoad($route,$data){
    }

    public static function rawLoad($route,$data = array()){
		ob_start();
        extract($data);
        require(VIEW.'template/'.$route.'.php');
		ob_end_flush();
	}

	public function restLoad($json){

		//TODO:Headers
		//Echo output

	}
	
}