<?php

namespace Controller;

use Library\Config;
use Library\Output;

/**
 * Return the 404 error pages, this is executed when the route it's not found
 * either in system/routes.php, or the path folder/class/method was wrong
 */

class ErrorController
{

    /**
     * Returns the 404 error page
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
