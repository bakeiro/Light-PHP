<?php
class productModel extends SecModel
{
    public function getAllProducts()
    {
        $prods = Database::query("SELECT * FROM `product`");
        return $prods;
    }

    public function getProdInfo($prod_id)
    {
        $prod = Database::query("SELECT * FROM `product` WHERE id = :prod_id", array(":prod_id" => $prod_id));
        $prod['description'] = html_entity_decode($prod['description']);
        return $prod;
    }

    public function getProdsPage($offset)
    {
        $prod = Database::query("SELECT * FROM `product` LIMIT 4 OFFSET :offset", array(":offset" => $offset));
        return $prod;
    }
}
