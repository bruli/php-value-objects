<?php

namespace PhpValueObjects\Identity;

use Assert\Assertion;
use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidUuidException;

abstract class Uuid extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidUuidException
     */
    protected function guard($value)
    {
        try {
            Assertion::uuid($value);
        } catch (\Exception $e) {
            throw new InvalidUuidException($value);
        }
    }
}
