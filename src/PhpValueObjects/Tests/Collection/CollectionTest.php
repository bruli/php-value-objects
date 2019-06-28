<?php

namespace PhpValueObjects\Tests\Collection;


use PhpValueObjects\Collection\Exception\InvalidCollectionObjectException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class CollectionTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldThrowInvalidCollectionObjectException()
    {
        $this->expectException(InvalidCollectionObjectException::class);

        new Collection([new \stdClass(), new \stdClass()]);
    }

    /**
     * @test
     */
    public function itShouldReturnCollection()
    {
        $objects = [
            new ObjectForTest(),
            new ObjectForTest(),
            new ObjectForTest()
        ];

        $collection = new Collection($objects);

        $this->assertSame($objects, $collection->getCollection());
    }

    /**
     * @test
     */
    public function itShouldReturnEmptyCollection()
    {
        $collection = new Collection([]);

        $this->assertEmpty($collection->getCollection());
    }
}
