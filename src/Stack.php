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
 * Basic implementation of abstract stack
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class Stack extends AbstractStack
{

    /**
     * Class constructor
     *
     * @param array $elements
     * @param bool $isStack
     */
    public function __construct(array $elements = [], $isStack = true)
    {
        $this->collection = $isStack ? $elements : array_reverse($elements, true);
    }
}
