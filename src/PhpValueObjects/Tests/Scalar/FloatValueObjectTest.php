<?php

namespace PhpValueObjects\Tests\Scalar;

use PhpValueObjects\Scalar\Exception\InvalidFloatException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class FloatValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnFloat()
    {
        $float = new FloatValueObject($this->faker()->randomFloat(2));

        $this->assertTrue(is_float($float->value()));
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidFloatException::class);

        new FloatValueObject($this->faker()->name);
    }
}
