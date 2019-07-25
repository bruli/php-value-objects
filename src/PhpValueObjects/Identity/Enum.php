<?php
declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractValueObject;

abstract class Enum extends AbstractValueObject
{
    abstract protected function validValues(): array;

    protected function guard($value): void
    {
        if (false === in_array($value, $this->validValues())) {
            $this->throwException($value);
        }
    }
}
