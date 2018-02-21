<?php

class managentController{

    public function index(){

        /* Show all orders*/

        require(DIR_MODEL.'order/managentModel.php');
        $data['orders'] = managentModel::getAllOrders();
        $route = DIR_VIEW.'pags/managent/ordermanagentView.php';

        /* Load */
        viewClass::load($route,$data);
    }
}
