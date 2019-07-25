<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class LanguageCodeTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLanguageCode(): void
    {
        $language = $this->faker()->languageCode;

        $langVO = new LanguageCode($language);

        $this->assertSame($language, $langVO->value());
    }

    public function invalidLanguageCodeProvider(): array
    {
        return [
            [$this->faker()->address],
            [$this->faker()->numberBetween()],
        ];
    }

    /**
     * @test
     * @dataProvider invalidLanguageCodeProvider
     */
    public function isShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new LanguageCode($data);
    }
}
