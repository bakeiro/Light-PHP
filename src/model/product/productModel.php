<?php

namespace Model;

use Library\Database;

/**
 * Sample of how a model class is
 */

class ProductModel
{

    /**
     * Sample function: get all the rows from the table `product`
     *
     * @return Array
     */
    public function getAllProducts()
    {
        $prods = Database::query("SELECT * FROM `product`");
        return $prods;
    }

    /**
     * Sample function: get product by id
     *
     * @param int $prod_id product id for searching
     *
     * @return Array
     */
    public function getProductById($prod_id)
    {
        $prod = Database::query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
        return $prod;
    }
}
