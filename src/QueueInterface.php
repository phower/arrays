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
 * Queue interface
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
interface QueueInterface extends CollectionInterface
{

    /**
     * Enqueues value.
     *
     * @param mixed $value
     * @return \Phower\Arrays\QueueInterface
     */
    public function enqueue($value);

    /**
     * Dequeues value.
     *
     * @return mixed
     */
    public function dequeue();
}
