<?php

class errorController{

    function missing(){

        /* Here show the welcome page! */
        $data['title'] = "Error! The Page: ".$GLOBALS['route']." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        /* View */
        $route_view = DIR_VIEW."pags/info/notFoundView.php";

        /* Load */
        viewClass::load($route_view,$data);

    }
}