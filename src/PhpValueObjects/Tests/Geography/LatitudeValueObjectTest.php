<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLatitudeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class LatitudeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLatitude(): void
    {
        $latitude = $this->faker()->latitude;

        $latVo = new LatitudeValueObject($latitude);

        $this->assertSame($latitude, $latVo->value());
    }

    public function invalidLatitudeProvider(): array
    {
        return [
            [$this->faker()->name],
            [$this->faker()->randomFloat(4, -200, -95)],
            [$this->faker()->randomFloat(4, 100, 200)]
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidLatitudeProvider
     */
    public function itShouldThrowsException(?string $data): void
    {
        $this->expectException(InvalidLatitudeException::class);

        new LatitudeValueObject($data);
    }
}
