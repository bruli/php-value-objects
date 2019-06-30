<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Network\Exception\InvalidUrlException;

abstract class Url extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException($value);
        }
    }
}
