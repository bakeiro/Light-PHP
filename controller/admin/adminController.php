<?php

class adminController{

    public function index(){
        $route_view = DIR_VIEW."pags/admin/loginView.php";
        $data = array();
        $data['msg'] = '';

        if(isset($GLOBALS['settings']['error']['msg'])){
            $data['msg'] = $GLOBALS['settings']['error']['msg'];
        }
        viewClass::load($route_view,$data);
    }

    public function login(){

        require(DIR_SYSTEM.'library/login.php');
        $route_view = DIR_VIEW.'pags/admin/secretView.php';


        viewClass::load($route_view);
    }

    public function orders(){

        /* Show all orders*/
        require(DIR_MODEL.'order/managentModel.php');

        $managent_model = new managentModel();
        $data['orders'] = $managent_model->getAllOrders();
        $route = DIR_VIEW.'pags/admin/ordermanagentView.php';

        /* Load */
        viewClass::load($route,$data);
    }
}