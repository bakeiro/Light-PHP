<?php

namespace Engine;

/**
 * Describes the class of a container (nearly PSR-11) that exposes methods to read its entries.
 */
class Container
{

    /**
     * Array of services initialized and stored in the container
     */
    public static $data = [];

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($key)
    {
        return isset(get_class($this)::$data[$key]) ? get_class($this)::$data[$key] : '';
    }

    /**
     * Set an entry in the container and its identifier
     */
    public function set($key, $value): void
    {
        Container::$data[$key] = $value;
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     */
    public function has($key): bool
    {
        return isset(Container::$data[$key]);
    }
}
