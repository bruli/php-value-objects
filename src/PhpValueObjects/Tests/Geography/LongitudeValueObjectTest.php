<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLongitudeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class LongitudeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLongitude(): void
    {
        $longitude = $this->faker()->longitude;

        $longVO = new LongitudeValueObject($longitude);

        $this->assertSame($longitude, $longVO->value());
    }

    public function invalidLongitudeProvider(): array
    {
        return [
            [$this->faker()->name],
            [$this->faker()->randomFloat(4, -200, -185)],
            [$this->faker()->randomFloat(4, 185, 200)]
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidLongitudeProvider
     */
    public function itShouldThrowsException($data): void
    {
        $this->expectException(InvalidLongitudeException::class);

        new LongitudeValueObject($data);
    }
}
