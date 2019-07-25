<?php

declare(strict_types=1);


namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class CountryCodeTest extends BaseUnitTestCase
{
    public function countryCodeProvider(): array
    {
        return [
            ['GB'],
            ['ES'],
            ['BA'],
            ['FR'],
        ];
    }

    /**
     * @test
     * @dataProvider countryCodeProvider
     */
    public function itShouldReturnCountryCode(string $country): void
    {
        $countryVO = new CountryCode($country);

        $this->assertSame($country, $countryVO->value());
    }

    public function invalidCountryCodeProvider(): array
    {
        return [
            [$this->faker()->address],
            [$this->faker()->numberBetween()]
        ];
    }

    /**
     * @test
     * @dataProvider invalidCountryCodeProvider
     */
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new CountryCode($data);
    }
}
