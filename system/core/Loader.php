<?php
class Loader{

	public function load_template($route, $data){

        extract($data);

        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
	}
	
	public function load_file($route){
        ob_start();
        
        require($route);
        
        $output = ob_get_contents();
        
        ob_end_clean();
        
        return $output;
	}

	

}