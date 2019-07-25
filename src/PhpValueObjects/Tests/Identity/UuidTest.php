<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class UuidTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUuid(): void
    {
        $uuid = $this->faker()->uuid;

        $uuidVO = new Uuid($uuid);

        $this->assertSame($uuid, $uuidVO->value());
    }

    public function invalidUuidProvider(): array
    {
        return [
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
        $this->expectException(\Exception::class);

        new Uuid($data);
    }
}
