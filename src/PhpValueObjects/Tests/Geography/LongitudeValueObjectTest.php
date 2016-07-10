<?php


namespace PhpValueObjects\Tests\Geography;


use PhpValueObjects\Geography\Exception\InvalidLongitudeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class LongitudeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLongitude()
    {
        $longitude = $this->faker()->longitude;

        $longVO = new LongitudeValueObject($longitude);

        $this->assertSame($longitude, $longVO->value());
    }

    /**
     * @return array
     */
    public function invalidLongitudeProvider()
    {
        return [
            [null],
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
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidLongitudeException::class);

        new LongitudeValueObject($data);
    }
}
