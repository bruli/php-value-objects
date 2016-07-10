<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Scalar\Exception\InvalidIntegerException;

abstract class IntegerValueObject extends AbstractValueObject
{
    /**
     * @param int $value
     *
     * @throws InvalidIntegerException
     */
    protected function guard($value)
    {
        if (false === is_integer($value)) {
            throw new InvalidIntegerException($value);
        }
    }
}
