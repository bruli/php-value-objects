<?php

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidLocaleException;
use Symfony\Component\Intl\Intl;

abstract class Locale extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidLocaleException
     */
    protected function guard($value)
    {
        $localeName = Intl::getLocaleBundle()->getLocaleName($value);

        if (null === $localeName) {
            throw new InvalidLocaleException($value);
        }
    }
}
