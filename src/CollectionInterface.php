<?php

/**
 * Phower Arrays
 *
 * @version 1.0.0
 * @link https://github.com/phower/arrays Public Git repository
 * @copyright (c) 2015-2016, Pedro Ferreira <https://phower.com>
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace Phower\Arrays;

use ArrayAccess;
use Countable;
use Iterator;
use Serializable;

/**
 * Collection interface
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
interface CollectionInterface extends ArrayAccess, Countable, Iterator, Serializable
{

    /**
     * Checks that the collection has an element with a given key.
     *
     * @param string|int $key
     * @return bool
     */
    public function has($key);

    /**
     * Checks that the collection contains a given element.
     *
     * @param mixed $value
     * @return bool
     */
    public function contains($value);

    /**
     * Sets the value for a given key.
     *
     * @param string|int $key
     * @param mixed $value
     * @return \Phower\Arrays\CollectionInterface
     */
    public function set($key, $value);

    /**
     * Adds a value to the end of the collection.
     *
     * @param mixed $value
     * @return \Phower\Arrays\CollectionInterface
     */
    public function add($value);

    /**
     * Retrieves the value of a given key.
     *
     * @param string|int $key
     * @return mixed|null
     */
    public function get($key);

    /**
     * Returns the key of a given value.
     *
     * @param mixed $value
     * @return string|int
     */
    public function indexOf($value);

    /**
     * Removes an existing element.
     *
     * @param string|int $key
     * @return \Phower\Arrays\CollectionInterface
     */
    public function remove($key);

    /**
     * Deletes all elements containing a given value.
     *
     * @param mixed $value
     * @return \Phower\Arrays\CollectionInterface
     */
    public function delete($value);

    /**
     * Returns elements as an array.
     *
     * @return array
     */
    public function toArray();

    /**
     * Returns all keys as an array.
     *
     * @return array
     */
    public function getKeys();

    /**
     * Returns all values ignoring keys as an array.
     *
     * @return array
     */
    public function getValues();

    /**
     * Returns a new collection filtered by a callable.
     *
     * @param callable $callback
     * @return \Phower\Arrays\CollectionInterface
     */
    public function filter(callable $callback);

    /**
     * Returns a new sliced collection.
     *
     * @param int $offset
     * @param int|null $length
     * @return \Phower\Arrays\CollectionInterface
     */
    public function slice($offset, $length = null);

    /**
     * Applies a callable over all elements of the collection.
     *
     * @param callable $callback
     * @return \Phower\Arrays\CollectionInterface
     */
    public function map(callable $callback);
}
