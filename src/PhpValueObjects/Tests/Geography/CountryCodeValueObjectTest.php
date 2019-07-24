<?php

declare(strict_types=1);


namespace PhpValueObjects\Tests\Geography;

use PhpValueObjects\Geography\Exception\InvalidCountryCodeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class CountryCodeValueObjectTest extends BaseUnitTestCase
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
        $countryVO = new CountryCodeValueObject($country);

        $this->assertSame($country, $countryVO->value());
        $this->assertSame($country, $countryVO->__toString());
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
        $this->expectException(InvalidCountryCodeException::class);

        new CountryCodeValueObject($data);
    }
}
