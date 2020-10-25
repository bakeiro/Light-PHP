<?php

namespace Model;

use Library\Database;
use Engine\Model;

/**
 * Sample of how a model class is
 */
class ProductModel extends Model
{
    /**
     * Return all products
     *
     * @return Array
     */
    public function getAllProducts()
    {
        $prods = $this->database->query("SELECT * FROM `product`");
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
        $prod = $this->database->query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
        return $prod;
    }
}
