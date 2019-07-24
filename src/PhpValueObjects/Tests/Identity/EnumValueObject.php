<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidEnumException;

final class EnumValueObject extends \PhpValueObjects\Identity\EnumValueObject
{
    const VALID = 'valid';

    protected function validValues(): array
    {
        return [
            self::VALID
        ];
    }

    protected function throwException($value): void
    {
        throw new InvalidEnumException($value);
    }
}
