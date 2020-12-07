<?php

// phpcs:disable PSR1.Classes.ClassDeclaration

namespace Engine;

use Engine\Container;

/**
 * Controller class, this class executes the main controller's function based in the url,
 * checks wether the file, class and method exists, and executes it, if not executes the error method
 */
class Controller extends Container
{
    public function __get($dependency_name)
    {
        return $this->get($dependency_name);
    }

    public function __set($dependency_name, $dependency): void
    {
        $this->set($dependency_name, $dependency);
    }
}
