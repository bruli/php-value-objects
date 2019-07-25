<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Spatial;

use PhpValueObjects\Spatial\Exception\InvalidPolygonException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class MultiPolygonTest extends BaseUnitTestCase
{
    public function invalidDataProvider(): array
    {
        return [
            [[['string']]]
        ];
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function itShouldThrowException(array $data): void
    {
        $this->expectException(InvalidPolygonException::class);

        new MultiPolygon($data);
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

        $multiPolygon = new MultiPolygon($data);
        $this->assertNotNull($multiPolygon->value());
    }
}
