<?php

class Util{

	public $styles;
    public $scripts;

	public function __construct(){
		$this->styles = array();
		$this->scripts = array();
	}

	public function load_model($model_route){
        require_once(BACK_MODEL.$model_route.'Model.php'); //Make here require, its faster
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

    public function formatQuantity($quantity){

        //Only string and with 2 decimal always! (to check the '0')

        if(is_string($quantity)){

            /* validate quantity */
            $decimals = substr($quantity,strpos($quantity,'.')+1);

            if($decimals === ""){

            }else{
                if($decimals === '00'){
                    $quantity = number_format($quantity ,0,',','.');
                }else{
                    if(substr($decimals,1) === '0'){
                        $quantity  = number_format($quantity ,1,',','.');
                    }else{
                        $quantity  = number_format($quantity ,2,',','.');
                    }
                }
            }
        }

        return $quantity;
	}

}