<?php

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidSha256Exception;

abstract class Sha256ValueObject extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidSha256Exception
     */
    protected function guard($value)
    {
        if (false === (bool) preg_match('/^[a-f0-9]{64}$/', $value)) {
            throw new InvalidSha256Exception($value);
        }
    }
}
