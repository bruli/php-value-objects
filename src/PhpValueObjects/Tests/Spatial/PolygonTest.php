<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Spatial;

use PhpValueObjects\Spatial\Exception\InvalidPolygonException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class PolygonTest extends BaseUnitTestCase
{
    public function invalidDataProvider(): array
    {
        $latitude = $this->faker()->latitude;
        $longitude = $this->faker()->longitude;
        return [
            [
                'no_two_elements_by_array' => [
                    [$this->faker()->latitude],
                    [$this->faker()->lastName, $this->faker()->longitude],
                    [$this->faker()->lastName, $this->faker()->longitude]
                ]
            ],
            [
                'no_same_start_end_data' => [
                    [$this->faker()->latitude, $this->faker()->longitude],
                    [$this->faker()->latitude, $this->faker()->longitude],
                    [$this->faker()->latitude, $this->faker()->randomFloat()],
                ]
            ],
            [
                'no_polygon' => [
                    [$latitude, $longitude],
                    [$latitude, $longitude],
                ]
            ],
            [
                'element_no_array' => [
                    [$latitude, $longitude],
                    'string',
                    [$this->faker()->lastName, $this->faker()->longitude],
                    [$latitude, $longitude]
                ]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function itShouldThrowInvalidPolygonException($values): void
    {
        $this->expectException(InvalidPolygonException::class);

        new Polygon($values);
    }

    /**
     * @test
     */
    public function itShouldWorksFine(): void
    {
        $latitude = $this->faker()->latitude;
        $longitude = $this->faker()->longitude;

        $data = [
            [$latitude, $longitude],
            [$this->faker()->latitude, $this->faker()->longitude],
            [$latitude, $longitude]
        ];

        $polygon = new Polygon($data);

        $this->assertSame($data, $polygon->value());
    }
}
