<?php


namespace PhpValueObjects\Tests\Scalar;


use PhpValueObjects\Scalar\Exception\InvalidStringException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class StringValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnString()
    {
        $string = new StringValueObject($this->faker()->name);

        $this->assertTrue(is_string($string->value()));
        $this->assertTrue(is_string($string->__toString()));
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidStringException::class);

        $data = [$this->faker()->boolean, $this->faker()->numberBetween(), $this->faker()->randomFloat(2)];

        new StringValueObject($data[array_rand($data)]);
    }
}
