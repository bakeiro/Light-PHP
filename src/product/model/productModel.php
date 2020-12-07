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
     */
    public function getAllProducts(): array
    {
        return $this->database->query("SELECT * FROM `product`");
    }

    /**
     * Sample function: get product by id
     *
     * @param int $prod_id product id for searching
     */
    public function getProductById(int $prod_id): array
    {
        return $this->database->query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
    }
}
