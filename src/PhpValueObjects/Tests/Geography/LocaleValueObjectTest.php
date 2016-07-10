<?php

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLocaleException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class LocaleValueObjectTest extends BaseUnitTestCase
{
    /**
     * @return array
     */
    public function localeProvider()
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
    public function itShouldReturnLocale($locale)
    {
        $localeVO = new LocaleValueObject($locale);

        $this->assertSame($locale, $localeVO->value());
        $this->assertSame($locale, $localeVO->__toString());
    }

    /**
     * @return array
     */
    public function invalidLocaleProvider()
    {
        return [
            [null],
            [$this->faker()->address],
            [$this->faker()->numberBetween()],
        ];
    }

    /**
     * @test
     * @dataProvider invalidLocaleProvider
     */
    public function itShouldThrowsException($locale)
    {
        $this->expectException(InvalidLocaleException::class);

        new LocaleValueObject($locale);
    }
}
