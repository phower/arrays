<?php

/**
 * Phower Arrays
 *
 * @version 1.0.0
 * @link https://github.com/phower/arrays Public Git repository
 * @copyright (c) 2015-2016, Pedro Ferreira <https://phower.com>
 * @license https://opensource.org/licenses/MIT MIT
 */

namespace PhowerTest\Arrays;

use PHPUnit_Framework_TestCase;

/**
 * Stack test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class StackTest extends PHPUnit_Framework_TestCase
{

    public function testStackExtendsAbstractStack()
    {
        $stack = new \Phower\Arrays\Stack();
        $this->assertInstanceOf(\Phower\Arrays\AbstractStack::class, $stack);
    }

    public function testConstructCanInstantiateWithAnArray()
    {
        $values = ['bar', 'baz', 'foo'];
        $stack = new \Phower\Arrays\Stack($values);
        $this->assertEquals($values, $stack->toArray());
        $stack = new \Phower\Arrays\Stack($values, false);
        $this->assertEquals(array_reverse($values, true), $stack->toArray());
    }
}
