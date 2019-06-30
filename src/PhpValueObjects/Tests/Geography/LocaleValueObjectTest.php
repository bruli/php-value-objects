<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLocaleException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class LocaleValueObjectTest extends BaseUnitTestCase
{
    public function localeProvider(): array
    {
        return [
            ['es_ES'],
            ['es_AR'],
            ['en_GB'],
            ['en_US'],

        ];
    }
    /**
     * @test
     * @dataProvider localeProvider
     */
    public function itShouldReturnLocale(string $locale): void
    {
        $localeVO = new LocaleValueObject($locale);

        $this->assertSame($locale, $localeVO->value());
        $this->assertSame($locale, $localeVO->__toString());
    }

    public function invalidLocaleProvider(): array
    {
        return [
            [$this->faker()->address],
            [$this->faker()->numberBetween()],
        ];
    }

    /**
     * @test
     * @dataProvider invalidLocaleProvider
     */
    public function itShouldThrowsException(string $locale): void
    {
        $this->expectException(InvalidLocaleException::class);

        new LocaleValueObject($locale);
    }
}
