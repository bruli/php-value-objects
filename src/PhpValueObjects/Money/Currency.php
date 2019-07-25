<?php

declare(strict_types=1);

namespace PhpValueObjects\Money;

use PhpValueObjects\AbstractValueObject;
use Symfony\Component\Intl\Currencies;
use Symfony\Component\Intl\Exception\MissingResourceException;

abstract class Currency extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        try {
            Currencies::getName($value);
        } catch (MissingResourceException $exception) {
            $this->throwException($value);
        }
    }
}
