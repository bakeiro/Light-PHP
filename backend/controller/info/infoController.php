<?php

class infoController{

    public function contact(){

        $data['title'] = "Contact form";
        $data['description'] = "Here you can contact with us, either by the form or email";
        $route = DIR_VIEW.'pags/info/contactView.php';

        viewClass::load($route,$data);

    }
}