<?php

class Load{

    //This will load the models, JS, CSS and templates (gzip?)
    public static $styles = array();
    public static $scripts = array();

    static function load_model($model_route){
        require_once(BACK_MODEL.$model_route.'Model.php'); //Make here require, its faster
    }

    static function load_js($js_route){
        Load::$scripts[] = '<script src="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$js_route . '.js" > </script>';
    }

    static function load_css($css_route){
        Load::$styles[] = '<link href="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$css_route.'.css" rel="stylesheet">';
    }


}