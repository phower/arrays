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
 * Abstract stack test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class AbstractStackTest extends PHPUnit_Framework_TestCase
{

    public function testAbstractStackImplementsStackInterface()
    {
        $stack = $this->getMockForAbstractClass(\Phower\Arrays\AbstractStack::class);
        $this->assertInstanceOf(\Phower\Arrays\StackInterface::class, $stack);
    }

    public function testAddAddsElementToTheTopOfStack()
    {
        $stack = $this->getMockForAbstractClass(\Phower\Arrays\AbstractStack::class);
        $stack->add('first');
        $stack->add('second');
        $stack->rewind();
        $this->assertEquals('second', $stack->current());
        $stack->next();
        $this->assertEquals('first', $stack->current());
        $stack->next();
        $this->assertFalse($stack->valid());
    }
}
