<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidEmailException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class EmailValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnEmail(): void
    {
        $email = $this->faker()->email;

        $emailVO = new EmailValueObject($email);

        $this->assertSame($email, $emailVO->value());
        $this->assertSame($email, $emailVO->__toString());
    }

    public function invalidEmailProvider(): array
    {
        return [
            [$this->faker()->numberBetween()],
            [$this->faker()->address],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidEmailProvider
     */
    public function itShouldThrowsException(?string $data): void
    {
        $this->expectException(InvalidEmailException::class);

        new EmailValueObject($data);
    }
}
