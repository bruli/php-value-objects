<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Network\Exception\InvalidIpv4Exception;

abstract class Ipv4 extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidIpv4Exception($value);
        }
    }
}
