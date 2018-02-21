<?php

class View{

    public function load($route, $data = array()){

        ob_start();
        extract($data);
		unset($data);
		
        require(BACK_VIEW.'common/header.php');
        require($route);
        require(BACK_VIEW.'common/footer.php');
		
		ob_end_flush();
	}
	
	public function load_template($route, $data){

        extract($data);

        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
    }

    public function gzipLoad($route,$data){

        //TODO: 1st Compress and then load the template
    }

    public function set_headers($string){
        //Set up here the headers
    }

    public function rawload($route,$data = array()){
        //Load with no JS/CSS/Template
	}
	
}