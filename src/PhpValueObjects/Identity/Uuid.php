<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use Assert\Assertion;
use Exception;
use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Identity\Exception\InvalidUuidException;

abstract class Uuid extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        try {
            Assertion::uuid($value);
        } catch (Exception $e) {
            throw new InvalidUuidException($value);
        }
    }
}
