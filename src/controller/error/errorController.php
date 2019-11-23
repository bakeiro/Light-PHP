<?php

class errorController extends SecController
{
    public function notFound()
    {

        $data = array();
        $data['title'] = "Error! The Page: " . Config::get("url_action") . " couldnt be found!";
        $data['body'] = "The page which you are looking for its not available, try searching in another place or try this later.";

        Output::load("error/notFoundView", $data);
    }
}
