<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Collection;


use PhpValueObjects\Collection\Exception\InvalidCollectionObjectException;
use PhpValueObjects\Tests\BaseUnitTestCase;
use stdClass;

final class CollectionTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldThrowInvalidCollectionObjectException(): void
    {
        $this->expectException(InvalidCollectionObjectException::class);

        new Collection([new stdClass(), new stdClass()]);
    }

    /**
     * @test
     */
    public function itShouldReturnCollection(): void
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
    public function itShouldReturnEmptyCollection(): void
    {
        $collection = new Collection([]);

        $this->assertEmpty($collection->getCollection());
    }
}
