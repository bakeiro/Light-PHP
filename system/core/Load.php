<?php

class Load{

    //This will load the models, JS, CSS and templates (gzip?)
    public $styles = array();
    public $scripts = array();

	function load_model($model_route){
        require_once(BACK_MODEL.$model_route.'Model.php'); //Make here require, its faster
    }

	function load_js($js_route){
        $this->$scripts[] = '<script src="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$js_route . '.js" > </script>';
    }

	function load_css($css_route){
        $this->$styles[] = '<link href="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$css_route.'.css" rel="stylesheet">';
    }
}