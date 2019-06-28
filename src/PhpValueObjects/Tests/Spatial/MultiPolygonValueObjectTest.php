<?php

namespace PhpValueObjects\Tests\Spatial;

use PhpValueObjects\Spatial\Exception\InvalidMultiPolygonException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class MultiPolygonValueObjectTest extends BaseUnitTestCase
{
    public function invalidDataProvider()
    {
        return [
            'no_array' => ['string']
        ];
    }

    /**
     * @param $data
     * @test
     * @dataProvider invalidDataProvider
     */
    public function itShouldThrowInvalidMultipolygonException($data)
    {
        $this->expectException(InvalidMultiPolygonException::class);

        new MultiPolygonValueObject($data);
    }

    /**
     * @test
     */
    public function itShouldWorksFine()
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
    }
}
