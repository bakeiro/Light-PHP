<?php

namespace Model;

use Library\Database;

/**
 * Just a sample...
 */

class ProductModel
{
    public function getAllProducts()
    {
        $prods = Database::query("SELECT * FROM `product`");
        return $prods;
    }

    public function getProductById($prod_id)
    {
        $prod = Database::query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
        return $prod;
    }
}
