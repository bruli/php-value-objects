<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidLocaleException;
use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Locales;

abstract class Locale extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        try {
            Locales::getName($value);
        } catch (MissingResourceException $exception) {
            throw new InvalidLocaleException($value);
        }

    }
}
