<?php
declare(strict_types=1);

namespace PhpValueObjects\Network\Exception;

use Exception;

final class InvalidIpv6Exception extends Exception
{
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid ipv6 address.', $value));
    }
}
