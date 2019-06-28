<?php

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLatitudeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class LatitudeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLatitude()
    {
        $latitude = $this->faker()->latitude;

        $latVo = new LatitudeValueObject($latitude);

        $this->assertSame($latitude, $latVo->value());
    }

    /**
     * @return array
     */
    public function invalidLatitudeProvider()
    {
        return [
            [$this->faker()->name],
            [null],
            [$this->faker()->randomFloat(4, -200, -95)],
            [$this->faker()->randomFloat(4, 100, 200)]
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidLatitudeProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidLatitudeException::class);

        new LatitudeValueObject($data);
    }
}
