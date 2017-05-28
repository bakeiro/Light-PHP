<?php
class managentModel{

    public function getAllOrders(){

        //Sql
        $sql_get_all_orders = "select * from `order` order by order_id desc limit 2000;";
        $orders = array();

        //Fill array
        foreach($GLOBALS['CONN']->query($sql_get_all_orders) as $order){
            $orders[] = $order;
        }

        return $orders;
    }
}