<?php

class viewClass{

    /* Load the template with all the info from the $data array */
    public static function load($route,$data = array()){

        ob_start();
        extract($data);
        require(DIR_VIEW.'common/header.php');
        require($route);
        require(DIR_VIEW.'common/footer.php');
        ob_end_flush();
    }

    public static function gzipLoad($route,$data){

        /* Load the template but output gziped content to be faster */
        //ob_start();

        //extract($data);
        //require($route);

        //ob_end_flush();
    }
}