<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractValueObject;

abstract class TcpPort extends AbstractValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        if ($value < 0 || $value > 65535) {
            $this->throwException($value);
        }
    }
}
