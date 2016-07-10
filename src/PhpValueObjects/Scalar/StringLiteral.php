<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Scalar\Exception\InvalidStringException;

abstract class StringLiteral extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidStringException
     */
    protected function guard($value)
    {
        if (false === is_string($value)) {
            throw new InvalidStringException($value);
        }
    }
}
