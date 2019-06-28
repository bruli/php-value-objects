<?php


namespace PhpValueObjects\Tests\Identity;


use PhpValueObjects\Identity\Exception\InvalidEmailException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class EmailValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnEmail()
    {
        $email = $this->faker()->email;

        $emailVO = new EmailValueObject($email);

        $this->assertSame($email, $emailVO->value());
        $this->assertSame($email, $emailVO->__toString());
    }

    /**
     * @return array
     */
    public function invalidEmailProvider()
    {
        return [
            [null],
            [$this->faker()->numberBetween()],
            [$this->faker()->address],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidEmailProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidEmailException::class);

        new EmailValueObject($data);
    }
}
