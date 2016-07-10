<?php

namespace PhpValueObjects\Tests\Scalar;

use PhpValueObjects\Scalar\Exception\InvalidIntegerException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class IntegerValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnInteger()
    {
        $integer = new IntegerValueObject($this->faker()->numberBetween());

        $this->assertTrue(is_integer($integer->value()));
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidIntegerException::class);

        new IntegerValueObject($this->faker()->name);
    }
}
