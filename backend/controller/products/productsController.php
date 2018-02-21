<?php
class productsController{

    public function index(){

        /* Show here 10 products */
        require(DIR_MODEL.'products/productsModel.php');

        $data['products'] = productsModel::getAllProducts();
        $route = DIR_VIEW.'pags/products/productsView.php';

        /* Load */
        viewClass::load($route,$data);
    }
}