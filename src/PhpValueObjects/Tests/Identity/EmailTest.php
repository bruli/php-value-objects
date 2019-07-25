<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class EmailTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnEmail(): void
    {
        $email = $this->faker()->email;

        $emailVO = new Email($email);

        $this->assertSame($email, $emailVO->value());
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
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new Email($data);
    }
}
