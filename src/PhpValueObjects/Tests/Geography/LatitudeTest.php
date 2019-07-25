<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class LatitudeTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLatitude(): void
    {
        $latitude = $this->faker()->latitude;

        $latVo = new Latitude($latitude);

        $this->assertSame($latitude, $latVo->value());
    }

    public function invalidLatitudeProvider(): array
    {
        return [
            [$this->faker()->randomFloat(4, -200, -95)],
            [$this->faker()->randomFloat(4, 100, 200)]
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidLatitudeProvider
     */
    public function itShouldThrowsException(float $data): void
    {
        $this->expectException(\Exception::class);

        new Latitude($data);
    }
}
