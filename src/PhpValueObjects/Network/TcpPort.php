<?php

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Network\Exception\InvalidTcpPortException;

abstract class TcpPort extends AbstractValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidTcpPortException
     */
    protected function guard($value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_INT)) {
            throw new InvalidTcpPortException($value);
        }

        if ($value < 0 || $value > 65535) {
            throw new InvalidTcpPortException($value);
        }
    }
}
