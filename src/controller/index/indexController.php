<?php

namespace Controller;

use Library\Output;
use Library\Console;
use Model\productModel;

class IndexController
{
    public function index()
    {
        // String in console
        Console::addDebugInfo("welcome page loaded ;)");

        // Exception
        $cont = 5;
        $cont = $cont / 0;

        // Array in console
        $list = array(1, "my_value", "hi there! ");
        Console::addDebugInfo($list);

        // Add js file
        Output::addJs("products");

        // Model info...
        // productModel->getProductById(12345);

        // Load template
        Output::load("welcome/welcomeView");
    }

    public function sample()
    {
        $product_name = "test product";
        $product_price = "900€";
        $product_description = "this is just a test product";

        $data = array("product_name" => $product_name, "product_price" => $product_price, "product_description" => $product_description);
        Output::load("welcome/sampleView", $data);
    }

}
