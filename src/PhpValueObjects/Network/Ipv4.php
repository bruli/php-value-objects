<?php

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Network\Exception\InvalidIpv4Exception;

abstract class Ipv4 extends AbstractStringValueObject
{
    /**
     * @param string $value
     *
     * @throws InvalidIpv4Exception
     */
    protected function guard($value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidIpv4Exception($value);
        }
    }
}
