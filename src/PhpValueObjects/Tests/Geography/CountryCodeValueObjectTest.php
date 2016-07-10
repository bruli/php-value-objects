<?php


namespace PhpValueObjects\Tests\Geography;


use PhpValueObjects\Geography\Exception\InvalidCountryCodeException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class CountryCodeValueObjectTest extends BaseUnitTestCase
{
    /**
     * @return array
     */
    public function countryCodeProvider()
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
    public function itShouldReturnCountryCode($country)
    {
        $countryVO = new CountryCodeValueObject($country);

        $this->assertSame($country, $countryVO->value());
        $this->assertSame($country, $countryVO->__toString());
    }

    /**
     * @return array
     */
    public function invalidCountryCodeProvider()
    {
        return [
            [null],
            [$this->faker()->address],
            [$this->faker()->numberBetween()]
        ];
    }

    /**
     * @test
     * @dataProvider invalidCountryCodeProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidCountryCodeException::class);

        new CountryCodeValueObject($data);
    }
}
