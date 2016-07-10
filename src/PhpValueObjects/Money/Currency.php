<?php

namespace PhpValueObjects\Money;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Money\Exception\InvalidCurrencyException;
use Symfony\Component\Intl\Intl;

abstract class Currency extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidCurrencyException
     */
    protected function guard($value)
    {
        $currency = Intl::getCurrencyBundle()->getCurrencyName($value);

        if (null === $currency) {
            throw new InvalidCurrencyException($value);
        }
    }
}
