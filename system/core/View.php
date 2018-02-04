<?php

class viewClass{

    /* Load the template with all the info from the $data array */
    public function load($route,$data = array()){

        /** Notes to make it faster **/
        //never use require_once
        //Use full path
        //AutoLoads??

        ob_start();
        extract($data);
        unset($data);
        require(BACK_VIEW.'common/header.php'); //$settings['styles']

        //require(sidenav);//at the moment inside header
        require($route); //template
        //require(right_column);

        require(BACK_VIEW.'common/footer.php'); //$settings['scripts'] $settings['messages'] $settings['errors']
        ob_end_flush();
    }

    public function gzipLoad($route,$data){

        /* Load the template but output gziped content to be faster */
        //ob_start();

        //extract($data);
        //require($route);

        //ob_end_flush();
    }

    public function set_headers($string){

        //Set up here the headers

    }

    public function rawload($route,$data = array()){
        ob_start();
        extract($data);
        require(BACK_VIEW.'common/rawheader.php'); //$settings['styles']
        require($route);
        require(BACK_VIEW.'common/rawfooter.php'); //$settings['scripts'] $settings['messages'] $settings['errors']
        ob_end_flush();
    }

    public function load_template($route,$data){

        extract($data);
        //unset($data);

        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
    }
}