<?php

namespace Controller;

use Library\Config;
use Library\Output;

/**
 * Controller used for returning 404 error
 * pages
 */

class ErrorController
{

    /**
     * Returns the same template when the
     * route/method/class was not found
     *
     * @return void
     */
    public function notFound()
    {
        $data = array();
        $data['title'] = "Error! The Page: " . Config::get("url_action") . " couldn't be found!";
        $data['body'] = "The page which you are looking for its not available, try searching in another place or try this later.";

        Output::load("error/notFoundView", $data);
    }
}
