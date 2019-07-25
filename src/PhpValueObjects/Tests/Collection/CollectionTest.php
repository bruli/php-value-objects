<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Collection;

use PhpValueObjects\Collection\Exception\InvalidCollectionObjectException;
use PhpValueObjects\Tests\BaseUnitTestCase;
use stdClass;

final class CollectionTest extends BaseUnitTestCase
{
    private $objects;
    private $collection;

    protected function setUp()
    {
        parent::setUp();
        $this->objects = [
            new ObjectForTest(1),
            new ObjectForTest(2),
            new ObjectForTest(3),
            new ObjectForTest(4),
            new ObjectForTest(5),
        ];
        $this->collection = new Collection($this->objects);
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->objects = null;
        $this->collection = null;
    }

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
        $this->assertSame($this->objects, $this->collection->getCollection());
    }

    /**
     * @test
     */
    public function itShouldReturnEmptyCollection(): void
    {
        $collection = new Collection([]);

        $this->assertEmpty($collection->getCollection());
    }

    /**
     * @test
     */
    public function itShouldReturnFirst(): void
    {
        /** @var ObjectForTest $object */
        $object = $this->collection->first();
        $this->assertSame(1, $object->getId());
    }

    /**
     * @test
     */
    public function itShouldReturnLast(): void
    {
        /** @var ObjectForTest $object */
        $object = $this->collection->last();
        $this->assertSame(5, $object->getId());
    }

    /**
     * @test
     */
    public function itShouldReturnKey(): void
    {
        $key = $this->collection->key();
        $this->assertSame(0, $key);
    }

    /**
     * @test
     */
    public function itShouldReturnNext(): void
    {
        $first = $this->collection->first();
        $this->assertSame(1, $first->getId());
        $next = $this->collection->next();
        $this->assertSame(2, $next->getId());
    }

    /**
     * @test
     */
    public function itShouldReturnCurrent(): void
    {
        $this->collection->first();
        $this->collection->next();
        $current = $this->collection->current();
        $this->assertSame(2, $current->getId());
    }

    /**
     * @test
     */
    public function itShouldRemoveKey(): void
    {
        $this->collection->remove(4);
        $this->assertFalse(array_key_exists(4, $this->collection->getCollection()));
    }

    /**
     * @test
     */
    public function itShouldRemoveElement(): void
    {
        $element = $this->collection->first();
        $response = $this->collection->removeElement($element);
        $this->assertTrue($response);
    }

    /**
     * @test
     */
    public function itShouldReturnContains(): void
    {
        $element = $this->collection->last();
        $this->assertTrue($this->collection->contains($element));
    }

    /**
     * @test
     */
    public function itShouldReturnElementByKey(): void
    {
        $this->assertInstanceOf(ObjectForTest::class, $this->collection->get(3));
        $this->assertNull($this->collection->get(25));
    }

    /**
     * @test
     */
    public function itShouldReturnKeys(): void
    {
        $keys = $this->collection->getKeys();
        $this->assertNotEmpty($keys);
    }

    /**
     * @test
     */
    public function itShouldReturnValues(): void
    {
        $values = $this->collection->getValues();
        $this->assertNotEmpty($values);
    }

    /**
     * @test
     */
    public function itShouldReturnCount(): void
    {
        $this->assertSame(5, $this->collection->count());
    }

    /**
     * @test
     */
    public function itShouldSetObject(): void
    {
        $new = new ObjectForTest(7);
        $this->collection->set(3, $new);
        $this->assertSame($this->collection->get(3)->getId(), $new->getId());
    }

    /**
     * @test
     */
    public function itShouldAddObject(): void
    {
        $new = new ObjectForTest(25);
        $this->collection->add($new);
        $this->assertSame($new->getId(), $this->collection->last()->getId());
    }

    /**
     * @test
     */
    public function itShouldClearObjects(): void
    {
        $this->assertFalse($this->collection->isEmpty());
        $this->collection->clear();
        $this->assertTrue($this->collection->isEmpty());
    }

    /**
     * @test
     */
    public function itShouldApplyReverseObjects(): void
    {
        $this->collection->add(new ObjectForTest(1));
        $this->collection->add(new ObjectForTest(2));
        $this->collection->add(new ObjectForTest(3));

        $this->collection->applyReverse();
        $this->assertSame(1, $this->collection->last()->getId());
    }

    /**
     * @test
     */
    public function itShouldReverseObjects(): void
    {
        $this->collection->add(new ObjectForTest(1));
        $this->collection->add(new ObjectForTest(2));
        $this->collection->add(new ObjectForTest(3));

        $data = $this->collection->reverse();
        $this->assertSame(1, end($data)->getId());
    }


}
