<?php

namespace Welcome;

use Engine\Controller;

/**
 * Default's controller, this shows the demo pages when you run for first time
 * this project
 */
class WelcomeController extends Controller
{
    /**
     * First sample page, returns welcome template
     * and uses the Console class as example of how to use it
     */
    public function index(): void
    {
        $this->console->addDebugInfo("welcome page loaded ;)");

        $cont = 5 / 0; // intentional exception to display it in the debug console ;)

        $this->console->addDebugInfo([1, "my_value", "hi there! "]);

        $this->output->addJs("products");

        $this->output->load("welcome/welcome");
    }
}
