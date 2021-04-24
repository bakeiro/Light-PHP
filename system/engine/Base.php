<?php

namespace Engine;

use Engine\Container;

/**
 * Contains the container and makes it's dependencies being accesible from the model and from the controller
 */
class Base extends Container
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
