<?php

use bakeiro\templateLoader;

class Output{

    public static function Load($route, $data = array()){

		$templateLoader = new templateLoader();
		
		$content = $templateLoader->load(VIEW.'template/common/Header.php');
		$content .= $templateLoader->load(VIEW.'template/'.$route.'.php', $data);
		$content .= $templateLoader->load(VIEW.'template/common/Footer.php');

		echo $content;		
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