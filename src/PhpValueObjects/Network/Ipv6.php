<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Network\Exception\InvalidIpv6Exception;

abstract class Ipv6 extends AbstractStringValueObject
{
    protected function guard($value): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            throw new InvalidIpv6Exception($value);
        }
    }
}
