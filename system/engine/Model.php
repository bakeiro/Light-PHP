<?php

namespace Engine;

/**
 * Model class, this class executes the main controller's function based in the url,
 * checks wether the file, class and method exists, and executes it, if not executes the error method
 */
class Model implements Container
{
    protected $container;

    public function __construct() {
        $this->container = $GLOBALS["container"];
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
