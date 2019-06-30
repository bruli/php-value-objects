<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Network\Exception\InvalidTcpPortException;

abstract class TcpPort extends AbstractValueObject
{
    protected function guard($value): void
    {
        if (!is_int($value)) {
            throw new InvalidTcpPortException($value);
        }

        if ($value < 0 || $value > 65535) {
            throw new InvalidTcpPortException($value);
        }
    }
}
