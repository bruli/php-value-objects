<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;
use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Locales;

abstract class Locale extends AbstractValueObject
{
    protected function guard($value): void
    {
        try {
            Locales::getName($value);
        } catch (MissingResourceException $exception) {
            $this->throwException($value);
        }
    }
}
