<?php

class productsModel{

    public static function getAllProducts(){

        $sql_get_products = "SELECT * FROM product pr inner join product_description pd on pr.product_id = pd.product_id order by pr.product_id desc limit 100";
        $products = array();
        foreach($GLOBALS['CONN']->query($sql_get_products) as $product){
            $products[] = $product;
        }

        return $products;
    }
}