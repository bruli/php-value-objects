<?php


namespace PhpValueObjects\Tests\Scalar;


use PhpValueObjects\Scalar\Exception\InvalidBooleanException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class BooleanValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnBoolean()
    {
        $boolean = new BooleanValueObject($this->faker()->boolean());

        $this->assertTrue(is_bool($boolean->value()));
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidBooleanException::class);

        new BooleanValueObject($this->faker()->name);
    }
}
