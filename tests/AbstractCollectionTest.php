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
 * Abstract collection test case
 *
 * @author Pedro Ferreira <pedro@phower.com>
 */
class AbstractCollectionTest extends PHPUnit_Framework_TestCase
{

    public function testAbstractCollectionImplementsCollectionInterface()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertInstanceOf(\Phower\Arrays\CollectionInterface::class, $collection);
    }

    public function testHasChecksIfAKeyExists()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertFalse($collection->has('some_key'));
    }

    public function testIndexOfReturnsKeyOfExistingValue()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertEquals(1, $collection->indexOf($values[1]));
    }

    public function testContainsChecksIfAValueExists()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertFalse($collection->contains('some_value'));
    }

    public function testSetCanSetAValueWithKey()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $collection->set('some_key', 'some_value');
        $this->assertTrue($collection->has('some_key'));
        $this->assertTrue($collection->contains('some_value'));
    }

    public function testAddCanAddAValueWithoutKey()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $collection->add('some_value');
        $this->assertTrue($collection->contains('some_value'));
    }

    public function testGetCanRetrieveAValueWithKey()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $collection->set('some_key', 'some_value');
        $this->assertEquals('some_value', $collection->get('some_key'));
    }

    public function testRemoveCanUnsetValueWithKey()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $collection->set('some_key', 'some_value');
        $this->assertTrue($collection->has('some_key'));
        $collection->remove('some_key');
        $this->assertFalse($collection->has('some_key'));
    }

    public function testDeleteCanUnsetValueWithoutKey()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $collection->add('some_value');
        $this->assertEquals(1, $collection->count());
        $collection->delete('some_value');
        $this->assertEquals(0, $collection->count());
    }

    public function testToArrayReturnsCollectionAsArray()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertEquals($values, $collection->toArray());
    }

    public function testGetKeysReturnsAllKeysAsArray()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertEquals(array_keys($values), $collection->getKeys());
    }

    public function testGetValuesReturnsAllValuesAsArray()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertEquals(array_values($values), $collection->getValues());
    }

    public function testFilterReturnsNewCollectionFilteredByACallable()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $callback = function ($key, $value) {
            return substr($value, 0, 1) === 'b';
        };
        $filtered = array_filter($values, $callback, ARRAY_FILTER_USE_BOTH);
        $this->assertInstanceOf(\Phower\Arrays\AbstractCollection::class, $collection->filter($callback));
        $this->assertEquals($filtered, $collection->filter($callback)->toArray());
    }

    public function testSliceReturnsNewSlicedCollection()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertInstanceOf(\Phower\Arrays\AbstractCollection::class, $collection->slice(1, 1));
    }

    public function testMapAppliesACallableOverAllElements()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $callback = function ($value) {
            return strtoupper($value);
        };
        $mapped = array_map($callback, $values);
        $this->assertEquals($mapped, $collection->map($callback)->toArray());
    }

    public function testAbstractCollectionImplementsArrayAccess()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertInstanceOf(\ArrayAccess::class, $collection);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $this->assertTrue(isset($collection[0]));
        $this->assertEquals($values[0], $collection[0]);
        $this->assertEquals(count($values), $collection->count());
        $collection[] = 'woo';
        $this->assertEquals(count($values) + 1, $collection->count());
        unset($collection[0]);
        $this->assertFalse(isset($collection[0]));
    }

    public function testAbstractCollectionImplementsCountable()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertInstanceOf(\Countable::class, $collection);
    }

    public function testAbstractCollectionImplementsIterator()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertInstanceOf(\Countable::class, $collection);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        foreach ($collection as $key => $value) {
            $this->assertEquals($values[$key], $value);
        }
    }

    public function testAbstractCollectionImplementsSerializable()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $this->assertInstanceOf(\Serializable::class, $collection);
        $values = ['bar', 'baz', 'foo'];
        foreach ($values as $key => $value) {
            $collection->set($key, $value);
        }
        $serialized = \Phower\Arrays\AbstractCollection::class . '@' . serialize($values);
        $this->assertEquals($serialized, $collection->serialize());
        $collection->unserialize($serialized);
        $this->assertEquals($values, $collection->toArray());
    }

    public function testUnserializeRaisesExceptionWhenSerializedStringIsInvalid()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $serialized = serialize([]);
        $this->setExpectedException(\Phower\Arrays\Exception\InvalidArgumentException::class);
        $collection->unserialize($serialized);
    }

    public function testUnserializeRaisesExceptionWhenUnserializedValueIsNotArray()
    {
        $collection = $this->getMockForAbstractClass(\Phower\Arrays\AbstractCollection::class);
        $serialized = \Phower\Arrays\AbstractCollection::class . '@' . serialize(true);
        $this->setExpectedException(\Phower\Arrays\Exception\InvalidArgumentException::class);
        $collection->unserialize($serialized);
    }
}
