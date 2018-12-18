<?php

class errorController extends SecController{

    function notFound(){

		$data = array();
        $data['title'] = "Error! The Page: ".Url::$action." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        Output::load("error/notFoundView",$data);
    }
}