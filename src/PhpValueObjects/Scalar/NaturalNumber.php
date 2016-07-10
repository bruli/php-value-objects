<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Scalar\Exception\InvalidNaturalNumberException;

abstract class NaturalNumber extends AbstractValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidNaturalNumberException
     */
    protected function guard($value)
    {
        if (false === is_numeric($value) || $value < 0) {
            throw new InvalidNaturalNumberException($value);
        }
    }
}
