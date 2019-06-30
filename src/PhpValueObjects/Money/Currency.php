<?php

declare(strict_types=1);

namespace PhpValueObjects\Money;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Money\Exception\InvalidCurrencyException;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Exception\MissingResourceException;

abstract class Currency extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        try {
            Currencies::getName($value);
        } catch (MissingResourceException $exception) {
            throw new InvalidCurrencyException($value);
        }

    }
}
