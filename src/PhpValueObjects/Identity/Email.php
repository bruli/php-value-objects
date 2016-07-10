<?php

namespace PhpValueObjects\Identity;

use Assert\Assertion;
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
        try {
            Assertion::email($value);
        } catch (\Exception $e) {
            throw new InvalidEmailException($value);
        }
    }
}
