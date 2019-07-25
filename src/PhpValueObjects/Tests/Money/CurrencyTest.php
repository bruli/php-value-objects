<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Money;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class CurrencyTest extends BaseUnitTestCase
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
        $currency = new Currency($currencyCode);

        $this->assertSame($currencyCode, $currency->value());
    }

    /**
     * @test
     */
    public function itShouldThrowsException(): void
    {
        $this->expectException(\Exception::class);

        new Currency($this->faker()->address);
    }
}
