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
 * Queue test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class QueueTest extends PHPUnit_Framework_TestCase
{

    public function testQueueExtendsAbstractQueue()
    {
        $queue = new \Phower\Arrays\Queue();
        $this->assertInstanceOf(\Phower\Arrays\AbstractQueue::class, $queue);
    }

    public function testConstructCanInstantiateWithArray()
    {
        $values = ['bar', 'baz', 'foo'];
        $queue = new \Phower\Arrays\Queue($values);
        $this->assertEquals($values, $queue->toArray());
    }
}
