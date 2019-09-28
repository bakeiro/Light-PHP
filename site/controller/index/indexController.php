<?php

class indexController extends SecController
{
    public function index()
    {
        //Start some dbug info
        Console::addDebugInfo("welcome page loaded ;)");

        Database::query("select * from user");

        $cont = 5;
        $cont++;
        Console::addDebugInfo($cont);

        $cont = $cont / 0;

        $list = array(1, 2, 3, 5, "my_value", "hi there! ");
        Console::addDebugInfo($list);

        $my_obj = new stdClass();
        $my_obj->property_1 = "hi there";
        $my_obj->property_2 = "hi hi hi";
        Console::addDebugInfo($my_obj);

        Output::load("info/welcomeView");
    }

    public function products()
    {
        Output::addJs("products");
        Output::addJs("events");
        Output::load("info/productsView", array());
    }
}
