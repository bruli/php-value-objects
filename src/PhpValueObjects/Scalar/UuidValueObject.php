<?php

namespace PhpValueObjects\Scalar;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Scalar\Exception\InvalidUuidException;
use Ramsey\Uuid\Uuid;

class UuidValueObject extends AbstractValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidUuidException
     */
    protected function guard($value)
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidUuidException($value);
        }
    }
}
