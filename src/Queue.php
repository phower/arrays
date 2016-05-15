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
 * Basic implementation of abstract queue
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class Queue extends AbstractQueue
{

    /**
     * Class constructor
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->collection = $elements;
    }
}
