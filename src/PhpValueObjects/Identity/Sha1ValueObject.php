<?php

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidSha1Exception;

abstract class Sha1ValueObject extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidSha1Exception
     */
    protected function guard($value)
    {
        if (false === (bool) preg_match('/^[a-f0-9]{40}$/', $value)) {
            throw new InvalidSha1Exception($value);
        }
    }
}
