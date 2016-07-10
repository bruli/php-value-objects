<?php

namespace PhpValueObjects\Tests\Scalar;

use PhpValueObjects\Scalar\Exception\InvalidNaturalNumberException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class NaturalNumberValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnNaturalNumber()
    {
        $natural = new NaturalNumberValueObject($this->faker()->numberBetween());

        $this->assertTrue($natural->value() >= 0);
    }

    public function invalidDataProvider()
    {
        return [
            [$this->faker()->numberBetween(-100, -1)],
            [$this->faker()->name],
        ];
    }
    /**
     * @test
     * @dataProvider invalidDataProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidNaturalNumberException::class);

        new NaturalNumberValueObject($data);
    }
}
