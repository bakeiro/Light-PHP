<?php

namespace Engine;

/**
 * Describes the interface of a container that exposes methods to read its entries.
 */
class Container
{

    /**
     * Array of services initialized and stored in the container
     */
    static $data = [];

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
	public function get($key) {
		return (isset($this->data[$key]) ? $this->data[$key] : '');
	}

    /**
     * Set
     *
     * @param	string	$key
	 * @param	string	$value
     */
	public function set($key, $value) {
		$this->data[$key] = $value;
	}

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
	public function has($key) {
		return isset($this->data[$key]);
    }

}
