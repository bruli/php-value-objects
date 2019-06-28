<?php

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Network\Exception\InvalidUrlException;

abstract class Url extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidUrlException
     */
    protected function guard($value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidUrlException($value);
        }
    }
}
