<?php

namespace Product;

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
        return $this->database->query("SELECT * FROM `product`");
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
        return $this->database->query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
    }
}
