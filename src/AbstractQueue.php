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
 * Abstract queue
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
abstract class AbstractQueue extends AbstractCollection implements QueueInterface
{

    /**
     * Enqueues value.
     *
     * @param mixed $value
     * @return \Phower\Arrays\AbstractQueue
     */
    public function enqueue($value)
    {
        $this->add($value);
        return $this;
    }

    /**
     * Dequeues value.
     *
     * @return mixed
     */
    public function dequeue()
    {
        return array_shift($this->collection);
    }
}
