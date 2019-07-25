<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

final class Enum extends \PhpValueObjects\Identity\Enum
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
        throw new \Exception();
    }
}
