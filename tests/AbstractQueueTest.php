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
 * Abstract queue test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class AbstractQueueTest extends PHPUnit_Framework_TestCase
{

    public function testAbstractQueueImplementsQueueInterface()
    {
        $queue = $this->getMockForAbstractClass(\Phower\Arrays\AbstractQueue::class);
        $this->assertInstanceOf(\Phower\Arrays\QueueInterface::class, $queue);
    }

    public function testEnqueueAddsElementToTheEndOfQueue()
    {
        $queue = $this->getMockForAbstractClass(\Phower\Arrays\AbstractQueue::class);
        $queue->enqueue('first');
        $queue->enqueue('second');
        $queue->rewind();
        $this->assertEquals('first', $queue->current());
        $queue->next();
        $this->assertEquals('second', $queue->current());
        $queue->next();
        $this->assertFalse($queue->valid());
    }

    public function testDequeueRemovesAndReturnsElementOffTheTopOfTheQueue()
    {
        $queue = $this->getMockForAbstractClass(\Phower\Arrays\AbstractQueue::class);
        $queue->enqueue('first');
        $queue->enqueue('second');
        $this->assertEquals(2, $queue->count());
        $this->assertEquals('first', $queue->dequeue());
        $this->assertEquals(1, $queue->count());
    }
}
