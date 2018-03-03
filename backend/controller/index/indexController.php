<?php

class indexController{

    public function index(){

        $data['title'] = "Welcome to my new page!";
        $data['body'] = "Im very excited about my new PHP framework";

        $route_view = DIR_VIEW."pags/info/welcomeView.php";

        viewClass::load($route_view,$data);
    }

}