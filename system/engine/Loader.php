<?php
class Loader{

	public static $styles;
    public static $scripts;

	public static function load_template($route, $data){

        extract($data);

        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
	}
	
	public static function load_file($route){
        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
	}

	public static function load_model($model_route){
        require(MODEL.$model_route.'Model.php');
    }

	public static function load_js($js_route){
        Loader::$scripts[] = '<script src="site/view/www/build/' . Settings::Get("cache_version") . '/' .$js_route . '.js" > </script>';
    }

	public static function load_css($css_route){
        Loader::$styles[] = '<link href="site/view/www/build/' . Settings::Get("cache_version") . '/' .$css_route.'.css" rel="stylesheet">';
    }

}