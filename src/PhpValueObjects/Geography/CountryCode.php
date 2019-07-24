<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidCountryCodeException;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Intl;

abstract class CountryCode extends AbstractStringValueObject
{
    public function __construct(string $value)
    {
        $this->guard($value);
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        try {
            Countries::getName($value);
        } catch (MissingResourceException $e) {
            throw new InvalidCountryCodeException($value);
        }
    }
}
