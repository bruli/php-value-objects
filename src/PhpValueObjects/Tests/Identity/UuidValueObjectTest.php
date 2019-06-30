<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidUuidException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class UuidValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUuid(): void
    {
        $uuid = $this->faker()->uuid;

        $uuidVO = new UuidValueObject($uuid);

        $this->assertSame($uuid, $uuidVO->value());
        $this->assertSame($uuid, $uuidVO->__toString());
    }

    public function invalidUuidProvider(): array
    {
        return [
            [$this->faker()->numberBetween()],
            [$this->faker()->address],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidUuidProvider
     */
    public function itShouldThrowsException($data): void
    {
        $this->expectException(InvalidUuidException::class);

        new UuidValueObject($data);
    }
}
