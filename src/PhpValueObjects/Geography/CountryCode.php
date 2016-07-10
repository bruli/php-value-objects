<?php

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidCountryCodeException;
use Symfony\Component\Intl\Intl;

abstract class CountryCode extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidCountryCodeException
     */
    protected function guard($value)
    {
        $countryName = Intl::getRegionBundle()->getCountryName($value);

        if (null === $countryName) {
            throw new InvalidCountryCodeException($value);
        }
    }
}
