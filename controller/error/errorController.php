<?php

class errorController extends App{

    function missing(){

        $data['title'] = "Error! The Page: ".$this->url->url." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        $route_view = BACK_VIEW."pags/info/notFoundView.php";

        $this->view->load($route_view,$data);
    }
}