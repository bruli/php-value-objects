<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidSha256Exception;

abstract class Sha256ValueObject extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === (bool)preg_match('/^[a-f0-9]{64}$/', $value)) {
            throw new InvalidSha256Exception($value);
        }
    }
}
