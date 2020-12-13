<?php

namespace Common;

use Engine\Controller;

/**
 * Return the 404 error pages, this is executed when the route it's not found
 * either in system/routes.php, or the path folder/class/method was wrong
 */
class CommonController extends Controller
{

    /**
     * Returns the 404 error page
     */
    public function pageNotFound(): void
    {
        $data = [
            "title" => "Error! The Page: " . $this->config->get("url_action") . " couldn't be found!",
            "body" => "The page which you are looking for its not available, try searching in another place or try this later."
        ];

        $this->output->load("common/pageNotFound", $data);
    }
}
