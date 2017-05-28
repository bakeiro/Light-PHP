<?php
class orderModel{

    public static function getAllOrders(){

        $sql_get_lastest_orders = "select * from `order` order by order_id desc";
        $orders = array();
        $orders = $CONN->query($sql_get_lastest_orders)->fetchAll();

        $cont=0;
        $cont++;
    }

}