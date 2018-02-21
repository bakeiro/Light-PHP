<?php

class Util{

	public $styles;
    public $scripts;

	public function __construct(){
		$this->styles = array();
		$this->scripts = array();
	}

	public function load_model($model_route){
        require(BACK_MODEL.$model_route.'Model.php');
    }

	public function load_js($js_route){
        $this->$scripts[] = '<script src="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$js_route . '.js" > </script>';
    }

	public function load_css($css_route){
        $this->$styles[] = '<link href="view/boot/' . $GLOBALS['settings']['cache']['version'] . '/' .$css_route.'.css" rel="stylesheet">';
    }
    
    public function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }
}