<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidMd5Exception;

abstract class Md5ValueObject extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === (bool)preg_match('/^[a-f0-9]{32}$/', $value)) {
            throw new InvalidMd5Exception($value);
        }
    }
}
