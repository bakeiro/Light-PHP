<?php

class managentController{

    public function index(){

        /* Show all orders*/

        require(DIR_MODEL.'order/managentModel.php');

        $managent_model = new managentModel();
        $data['orders'] = $managent_model->getAllOrders();
        $route = DIR_VIEW.'pags/ordermanagentView.php';

        /* Load */
        viewClass::load($route,$data);
    }
}
