<?php

class errorController{

    function notFound(){

        $data['title'] = "Error! The Page: ".Config::get("url_action")." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        $route_view = "error/notFoundView";

        Output::load($route_view,$data);
    }
}