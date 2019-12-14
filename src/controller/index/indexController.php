<?php

use Model\productModel;

class indexController
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

}
