<?php


namespace PhpValueObjects\Tests\Scalar;


class StringNullableValueObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itShouldReturnNull()
    {
        $nullable = new StringNullableValueObject(null);

        $this->assertNull($nullable->value());
    }
}
