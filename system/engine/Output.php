<?php

use bakeiro\templateLoader;

class Output{

	public static $styles;
    public static $scripts;

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

	public static function load_js($js_route){
        Output::$scripts[] = '<script src="site/view/www/build/' . Config::Get("cache_version") . '/' .$js_route . '.js" > </script>';
    }

	public static function load_css($css_route){
        Output::$styles[] = '<link href="site/view/www/build/' . Config::Get("cache_version") . '/' .$css_route.'.css" rel="stylesheet">';
    }
	
}