<?php

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidUuidException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class UuidValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUuid()
    {
        $uuid = $this->faker()->uuid;

        $uuidVO = new UuidValueObject($uuid);

        $this->assertSame($uuid, $uuidVO->value());
        $this->assertSame($uuid, $uuidVO->__toString());
    }

    public function invalidUuidProvider()
    {
        return [
            [null],
            [$this->faker()->numberBetween()],
            [$this->faker()->address],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidUuidProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidUuidException::class);

        new UuidValueObject($data);
    }
}
