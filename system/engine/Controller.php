<?php
// phpcs:disable PSR1.Classes.ClassDeclaration

namespace Engine;

/**
 * Controller class, this class executes the main controller's function based in the url,
 * checks wether the file, class and method exists, and executes it, if not executes the error method
 */
class Controller extends Container
{
    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function __get($dependency_name)
    {
        $this->container->get($dependency_name);
    }

    public function __set($dependency_name, $dependency)
    {
        $this->container->set($dependency_name, $dependency);
    }
}
