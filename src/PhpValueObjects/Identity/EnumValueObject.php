<?php
declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Identity\Exception\InvalidEnumException;

abstract class EnumValueObject extends AbstractValueObject
{
    abstract protected function validValues(): array;

    protected function guard($value): void
    {
        if (false === in_array($value, $this->validValues())) {
            throw new InvalidEnumException($value);
        }
    }
}
