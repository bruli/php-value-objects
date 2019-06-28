<?php

namespace PhpValueObjects\Tests\Money;

use PhpValueObjects\Money\Exception\InvalidCurrencyException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class CurrencyValueObjectTest extends BaseUnitTestCase
{
    /**
     * @return array
     */
    public function currencyCodeProvider()
    {
        return [
            ['EUR'],
            ['USD'],
            ['KYD'],
            ['HKD'],
        ];
    }
    /**
     * @test
     * @dataProvider currencyCodeProvider
     */
    public function itShouldReturnCurrency($currencyCode)
    {
        $currency = new CurrencyValueObject($currencyCode);

        $this->assertSame($currencyCode, $currency->value());
        $this->assertSame($currencyCode, $currency->__toString());
    }

    /**
     * @test
     */
    public function itShouldThrowsException()
    {
        $this->expectException(InvalidCurrencyException::class);

        new CurrencyValueObject($this->faker()->address);
    }
}
