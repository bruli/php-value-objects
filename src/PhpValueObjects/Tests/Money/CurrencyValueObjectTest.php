<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Money;

use PhpValueObjects\Money\Exception\InvalidCurrencyException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class CurrencyValueObjectTest extends BaseUnitTestCase
{
    public function currencyCodeProvider(): array
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
    public function itShouldReturnCurrency(string $currencyCode): void
    {
        $currency = new CurrencyValueObject($currencyCode);

        $this->assertSame($currencyCode, $currency->value());
        $this->assertSame($currencyCode, $currency->__toString());
    }

    /**
     * @test
     */
    public function itShouldThrowsException(): void
    {
        $this->expectException(InvalidCurrencyException::class);

        new CurrencyValueObject($this->faker()->address);
    }
}
