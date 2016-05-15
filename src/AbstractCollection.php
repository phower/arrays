<?php

/**
 * Phower Arrays
 *
 * @version 0.0.0
 * @link https://github.com/phower/arrays Public Git repository
 * @copyright (c) 2015-2016, Pedro Ferreira <https://phower.com>
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace Phower\Arrays;

/**
 * Abstract collection
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
abstract class AbstractCollection implements CollectionInterface
{

    /**
     * @var array
     */
    protected $collection = [];

    /**
     * Checks that the collection has an element with a given key.
     *
     * @param string|int $key
     * @return bool
     */
    public function has($key)
    {
        return array_key_exists($key, $this->collection);
    }

    /**
     * Checks that the collection contains a given element.
     *
     * @param mixed $value
     * @return bool
     */
    public function contains($value)
    {
        return false !== array_search($value, $this->collection, true);
    }

    /**
     * Sets the value for a given key.
     *
     * @param string|int $key
     * @param mixed $value
     * @return \Phower\Arrays\AbstractCollection
     */
    public function set($key, $value)
    {
        $this->collection[$key] = $value;
        return $this;
    }

    /**
     * Adds a value to the end of the collection.
     *
     * @param mixed $value
     * @return \Phower\Arrays\AbstractCollection
     */
    public function add($value)
    {
        $this->collection[] = $value;
        return $this;
    }

    /**
     * Retrieves the value of a given key.
     *
     * @param string|int $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key) ? $this->collection[$key] : null;
    }

    /**
     * Returns the key of a given value.
     *
     * @param mixed $value
     * @return string|int
     */
    public function indexOf($value)
    {
        return array_search($value, $this->collection, true);
    }

    /**
     * Removes an existing element.
     *
     * @param string|int $key
     * @return \Phower\Arrays\AbstractCollection
     */
    public function remove($key)
    {
        unset($this->collection[$key]);
        return $this;
    }

    /**
     * Deletes all elements containing a given value.
     *
     * @param mixed $value
     * @return \Phower\Arrays\AbstractCollection
     */
    public function delete($value)
    {
        foreach (array_keys($this->collection, $value, true) as $key) {
            unset($this->collection[$key]);
        }

        return $this;
    }

    /**
     * Returns elements as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->collection;
    }

    /**
     * Returns all keys as an array.
     *
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->collection);
    }

    /**
     * Returns all values ignoring keys as an array.
     *
     * @return array
     */
    public function getValues()
    {
        return array_values($this->collection);
    }

    /**
     * Returns a new collection filtered by a callable.
     *
     * @param callable $callback
     * @return \Phower\Arrays\AbstractCollection
     */
    public function filter(callable $callback)
    {
        $elements = array_filter($this->collection, $callback, ARRAY_FILTER_USE_BOTH);
        return new static($elements);
    }

    /**
     * Returns a new sliced collection.
     *
     * @param int $offset
     * @param int|null $length
     * @return \Phower\Arrays\AbstractCollection
     */
    public function slice($offset, $length = null)
    {
        $elements = array_slice($this->collection, (int) $offset, $length, true);
        return new static($elements);
    }

    /**
     * Applies a callable over all elements of the collection.
     *
     * @param callable $callback
     * @return \Phower\Arrays\AbstractCollection
     */
    public function map(callable $callback)
    {
        $this->collection = array_map($callback, $this->collection);
        return $this;
    }

    /**
     * Checks that an offset exists in the collection.
     *
     * @param string|int $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * Retrieves the value of a given offset.
     *
     * @param string|int $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Sets value of a given offset.
     *
     * @param string|int $offset
     * @param mixed $value
     * @return \Phower\Arrays\AbstractCollection
     */
    public function offsetSet($offset, $value)
    {
        return $this->set($offset, $value);
    }

    /**
     * Removes an existing offset.
     *
     * @param string|int $offset
     * @return \Phower\Arrays\AbstractCollection
     */
    public function offsetUnset($offset)
    {
        return $this->remove($offset);
    }

    /**
     * Returns the number of elements in the collection.
     *
     * @return int
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * Returns the current element of the collection.
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * Moves forward to next element in the collection.
     *
     * @return \Phower\Arrays\AbstractCollection
     */
    public function next()
    {
        next($this->collection);
        return $this;
    }

    /**
     * Returns the key of the current element of the collection.
     *
     * @return string|int|null
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * Checks if current position is valid.
     *
     * @return bool
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * Rewinds the Collection to the first element.
     *
     * @return \Phower\Arrays\AbstractCollection
     */
    public function rewind()
    {
        reset($this->collection);
        return $this;
    }

    /**
     * Returns a string representation of the collection.
     *
     * @return string
     */
    public function serialize()
    {
        return sprintf('%s@%s', __CLASS__, serialize($this->collection));
    }

    /**
     * Restores a serialized collection.
     *
     * @param string $serialized
     * @return \Phower\Arrays\AbstractCollection
     * @throws Exception\InvalidArgumentException
     */
    public function unserialize($serialized)
    {
        $identifier = __CLASS__ . '@';

        if (substr($serialized, 0, strlen($identifier)) !== $identifier) {
            $message = sprintf('Serialized value doesn\'t represents an instance.of "%s".', __CLASS__);
            throw new Exception\InvalidArgumentException($message);
        }

        $collection = unserialize(substr($serialized, strlen($identifier)));

        if (!is_array($collection)) {
            $type = is_object($collection) ? get_class($collection) : gettype($collection);
            $message = sprintf('Unserialized value in "%s" must be an array; "%s" was given.', __METHOD__, $type);
            throw new Exception\InvalidArgumentException($message);
        }

        $this->collection = $collection;
        return $this;
    }
}
