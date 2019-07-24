<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

final class EnumValueObject extends \PhpValueObjects\Identity\EnumValueObject
{
    const VALID = 'valid';

    protected function validValues(): array
    {
        return [
            self::VALID
        ];
    }
}
