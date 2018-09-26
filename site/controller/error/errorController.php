<?php

class errorController /*extends Controller*/{

    function notFound(){

        $data['title'] = "Error! The Page: ".Url::$controller." couldnt be found!";
        $data['body'] = "The page which you are looking for its not avaliable, try searching in another place or try this later.";

        $route_view = "error/notFoundView";

        Output::loadCompileTemplate($route_view,$data);
    }
}