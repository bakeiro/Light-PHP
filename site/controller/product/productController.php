<?php

class productController extends SecController
{
    public function getProdPage($page = 0)
    {
        $results_per_page = 4;
        $offset = $page * $results_per_page;

        require MODEL . "product/productModel.php";
        $product_model = new productModel();

        $products = array();
        $products = $product_model->getProdsPage($offset);

        return $products;
    }

    public function getProdInfo($prod_id)
    {
        require MODEL . "product/productModel.php";
        $product_model = new productModel();

        $products = array();
        $products = $product_model->getProdInfo($prod_id);

        return $products;
    }
}
