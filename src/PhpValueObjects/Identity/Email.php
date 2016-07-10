<?php

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidEmailException;

abstract class Email extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidEmailException
     */
    protected function guard($value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException($value);
        }
    }
}
