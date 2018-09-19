<?php

use bakeiro\templateLoader;

class Output{

    public static function loadCompileTemplate($route, $data = array()){

		$templateLoader = new templateLoader();
		
		$content = $templateLoader->load(VIEW.'template/common/Header.php');
		$content .= $templateLoader->load(VIEW.'template/'.$route.'.php', $data);
		$content .= $templateLoader->load(VIEW.'template/common/Footer.php');

		echo $content;		
	}

	public static function loadTemplate($route, $data=array()){

		ob_start();
		extract($data);

		require(VIEW.'template/common/Header.php');
		require(VIEW.'template/'.$route.'.php');
		require(VIEW.'template/common/Footer.php');
		
		ob_end_flush();
	}

    public static function rawLoad($route,$data = array()){
		ob_start();
        extract($data);
        require(VIEW.'template/'.$route.'.php');
		ob_end_flush();
	}
	
}