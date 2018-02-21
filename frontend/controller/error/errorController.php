<?php

class errorController extends App{

    function missing(){

        $data['title'] = "Error! The Page: ".$this->url->action." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        $route_view = BACK_VIEW."pags/info/notFoundView.php";

        $this->output->load($route_view,$data);
    }
}