<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidSha1Exception;

abstract class Sha1ValueObject extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === (bool)preg_match('/^[a-f0-9]{40}$/', $value)) {
            throw new InvalidSha1Exception($value);
        }
    }
}
