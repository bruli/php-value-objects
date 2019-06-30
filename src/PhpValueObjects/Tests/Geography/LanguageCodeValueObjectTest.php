<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLanguageCodeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class LanguageCodeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLanguageCode(): void
    {
        $language = $this->faker()->languageCode;

        $langVO = new LanguageCodeValueObject($language);

        $this->assertSame($language, $langVO->value());
        $this->assertSame($language, $langVO->__toString());
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
        $this->expectException(InvalidLanguageCodeException::class);

        new LanguageCodeValueObject($data);
    }
}
