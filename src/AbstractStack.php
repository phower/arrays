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

/**
 * Abstract stack
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
abstract class AbstractStack extends AbstractCollection implements StackInterface
{

    /**
     * Adds a value to the top of the collection.
     *
     * @param mixed $value
     * @return \Phower\Arrays\AbstractCollection
     */
    public function add($value)
    {
        array_unshift($this->collection, $value);
        return $this;
    }
}
