<?php
// phpcs:disable PSR1.Classes.ClassDeclaration

namespace Engine;

/**
 * Model class, this class executes the main controller's function based in the url,
 * checks wether the file, class and method exists, and executes it, if not executes the error method
 */
class Model implements Container
{
    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function get($dependency_name)
    {
        $this->container->get($dependency_name);
    }

    public function set($dependency_name, $dependency)
    {
        $this->container->set($dependency_name, $dependency);
    }

    public function has($dependency_name)
    {
        $this->container->get($dependency_name);
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
