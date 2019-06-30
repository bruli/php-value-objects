<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Spatial;

use PhpValueObjects\Spatial\Exception\InvalidMultiPolygonException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class MultiPolygonValueObjectTest extends BaseUnitTestCase
{
    public function invalidDataProvider(): array
    {
        return [
            'no_array' => ['string']
        ];
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function itShouldThrowInvalidMultipolygonException(string $data): void
    {
        $this->expectException(InvalidMultiPolygonException::class);

        new MultiPolygonValueObject($data);
    }

    /**
     * @test
     */
    public function itShouldWorksFine(): void
    {
        $latitude1 = $this->faker()->latitude;
        $latitude2 = $this->faker()->latitude;
        $longitude1 = $this->faker()->longitude;
        $longitude2 = $this->faker()->longitude;

        $data = [
            [
                [$latitude1, $longitude1],
                [$this->faker()->latitude, $this->faker()->longitude],
                [$this->faker()->latitude, $this->faker()->longitude],
                [$latitude1, $longitude1],
            ],
            [
                [$latitude2, $longitude2],
                [$this->faker()->latitude, $this->faker()->longitude],
                [$this->faker()->latitude, $this->faker()->longitude],
                [$latitude2, $longitude2]
            ]
        ];

        $multiPolygon = new MultiPolygonValueObject($data);
        $this->assertNotNull($multiPolygon->value());
    }
}
