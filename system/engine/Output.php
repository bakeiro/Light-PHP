<?php

use bakeiro\templateLoader;

class Output{

    public static function load($route, $data = array()){

		$templateLoader = new templateLoader();
		
		$content = $templateLoader->load(VIEW.'template/common/Header.php', $data);
		$content .= $templateLoader->load(VIEW.'template/'.$route.'.php', $data);
		$content .= $templateLoader->load(VIEW.'template/common/Footer.php', $data);

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
		$output_scripts = Config::get("output_scripts");
		$output_scripts[] = '<script src="site/view/www/build/' . Config::Get("cache_version") . '/' .$js_route . '.js" > </script>';
		Config::set("output_scripts", $output_scripts);
    }

	public static function load_css($css_route){
		$output_styles = Config::get("output_styles");
		$output_styles["styles"][] = '<link href="site/view/www/build/' . Config::Get("cache_version") . '/' .$css_route.'.css" rel="stylesheet">';
		Config::set("output_styles", $output_styles);
    }
	
}