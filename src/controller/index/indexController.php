<?php

namespace Controller;

use Engine\Controller;
use Library\Output;
use Library\Console;
use Model\productModel;

/**
 * Default's controller, this shows the demo pages when you run for first time
 * this project
 */
class IndexController extends Controller
{
    /**
     * First sample page, returns welcome template
     * and uses the Console class as example of how to use it
     *
     * @return void
     */
    public function index()
    {
        Console::addDebugInfo("welcome page loaded ;)");

        $cont = 5;
        $cont = $cont / 0;

        $list = array(1, "my_value", "hi there! ");
        Console::addDebugInfo($list);

        Output::addJs("products");

        // productModel->getProductById(12345);

        Output::load("welcome/welcomeView");
    }

    /**
     * Second sample page
     *
     * @return void
     */
    public function samplePage()
    {
        $product_name = "test product";
        $product_price = "900€";
        $product_description = "this is just a test product";

        $data = array("product_name" => $product_name, "product_price" => $product_price, "product_description" => $product_description);
        Output::load("welcome/sampleView", $data);
    }
}
