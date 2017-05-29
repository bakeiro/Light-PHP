<?php


class orderController{

    public function managent(){

        /* Get the lastest orders and show them */

        require(DIR_MODEL."/order/orderModel.php");
        $orders = orderModel::getAllOrders();


        $cont = 0;
        $cont++;
    }
}