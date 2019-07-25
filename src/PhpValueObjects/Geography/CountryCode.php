<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Exception\MissingResourceException;

abstract class CountryCode extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        try {
            Countries::getName($value);
        } catch (MissingResourceException $e) {
            $this->throwException($value);
        }
    }
}
