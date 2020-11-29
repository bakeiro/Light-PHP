<?php

namespace Welcome;

use Engine\Controller;

/**
 * Default's controller, this shows the demo pages when you run for first time
 * this project
 */
class welcomeController extends Controller
{
    /**
     * First sample page, returns welcome template
     * and uses the Console class as example of how to use it
     *
     * @return void
     */
    public function index()
    {
        $this->console->addDebugInfo("welcome page loaded ;)");

        $cont = 5;
        $cont = $cont / 0;

        $this->console->addDebugInfo([1, "my_value", "hi there! "]);

        $this->output->addJs("products");

        $this->output->load("welcome/welcomeView");
    }
}
