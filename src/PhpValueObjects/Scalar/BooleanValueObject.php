<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Scalar\Exception\InvalidBooleanException;

class BooleanValueObject extends AbstractValueObject
{
    /**
     * @param bool $value
     *
     * @throws InvalidBooleanException
     */
    protected function guard($value)
    {
        if (false === is_bool($value)) {
            throw new InvalidBooleanException($value);
        }
    }
}
