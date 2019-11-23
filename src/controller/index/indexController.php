<?php

class indexController extends SecController
{
    public function index()
    {
        //Start some dbug info
        Console::addDebugInfo("welcome page loaded ;)");

        $cont = 5;
        $cont = $cont / 0;

        $list = array(1, "my_value", "hi there! ");
        Console::addDebugInfo($list);

        Output::load("info/welcomeView");
    }

    public function products()
    {
        Output::addJs("products");
        Output::addJs("events");
        Output::load("info/productsView", array());
    }
}
