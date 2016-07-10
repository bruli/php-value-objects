<?php

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidMd5Exception;

abstract class Md5 extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidMd5Exception
     */
    protected function guard($value)
    {
        if (0 === preg_match('/^[a-f0-9]{32}$/', $value)) {
            throw new InvalidMd5Exception($value);
        }
    }
}
