<?php
class Loader{

	


	public static function load_model($model_route){
        require(MODEL.$model_route.'Model.php');
    }

	

}