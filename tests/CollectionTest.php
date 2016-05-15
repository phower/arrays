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
 * Collection test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class CollectionTest extends PHPUnit_Framework_TestCase
{

    public function testCollectionExtendsAbstractCollection()
    {
        $collection = new \Phower\Arrays\Collection();
        $this->assertInstanceOf(\Phower\Arrays\AbstractCollection::class, $collection);
    }

    public function testConstructCanInstantiateWithArray()
    {
        $values = ['bar', 'baz', 'foo'];
        $collection = new \Phower\Arrays\Collection($values);
        $this->assertEquals($values, $collection->toArray());
    }
}
