<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Scalar\Exception\InvalidFloatException;

abstract class FloatValueObject extends AbstractValueObject
{
    /**
     * @param float $value
     *
     * @throws InvalidFloatException
     */
    protected function guard($value)
    {
        if (false === is_float($value)) {
            throw new InvalidFloatException($value);
        }
    }
}
