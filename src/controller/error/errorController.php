<?php

namespace Controller;

use Library\Config;
use Library\Output;

class errorController
{
    public function notFound()
    {
        $data = array();
        $data['title'] = "Error! The Page: " . Config::get("url_action") . " couldn't be found!";
        $data['body'] = "The page which you are looking for its not available, try searching in another place or try this later.";

        Output::load("error/notFoundView", $data);
    }
}
