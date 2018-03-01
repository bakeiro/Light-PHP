<?php

class errorController{

    function notFound(){

        $data['title'] = "Error! The Page: ".Url::$action." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        $route_view = BACK_VIEW."pags/error/notFoundView.php";

        Output::load($route_view,$data);
    }
}