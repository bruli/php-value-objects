<?php

namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidLanguageCodeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class LanguageCodeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnLanguageCode()
    {
        $language = $this->faker()->languageCode;

        $langVO = new LanguageCodeValueObject($language);

        $this->assertSame($language, $langVO->value());
        $this->assertSame($language, $langVO->__toString());
    }

    /**
     * @return array
     */
    public function invalidLanguageCodeProvider()
    {
        return [
            [null],
            [$this->faker()->address],
            [$this->faker()->numberBetween()],
        ];
    }
    /**
     * @test
     * @dataProvider invalidLanguageCodeProvider
     */
    public function isShouldThrowsException($data)
    {
        $this->expectException(InvalidLanguageCodeException::class);

        new LanguageCodeValueObject($data);
    }
}
