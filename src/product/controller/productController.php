<?php

namespace Product;

use Engine\Controller;

/**
 * Default's controller, this shows the demo pages when you run for first time
 * this project
 */
class productController extends Controller
{

    /**
     * Product sample page
     *
     * @return void
     */
    public function samplePage()
    {
        $product_name = "test product";
        $product_price = "900€";
        $product_description = "this is just a test product";

        // $product_model = new productModel();
        // $product_data = $product_model->getAllProducts();

        $data = array("product_name" => $product_name, "product_price" => $product_price, "product_description" => $product_description);
        $this->output->load("product/productDescription", $data);
    }
}
