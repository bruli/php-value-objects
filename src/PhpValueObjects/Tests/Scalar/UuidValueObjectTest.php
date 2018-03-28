<?php

namespace PhpValueObjects\Tests\Scalar;

use PhpValueObjects\Scalar\Exception\InvalidUuidException;
use PhpValueObjects\Tests\BaseUnitTestCase;
use Ramsey\Uuid\Uuid;

class UuidValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUuid()
    {
        $uuid = new UuidValueObject($this->faker()->uuid());

        $this->assertTrue(Uuid::isValid($uuid->value()));
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidUuidException::class);

        new UuidValueObject($this->faker()->name);
    }
}
