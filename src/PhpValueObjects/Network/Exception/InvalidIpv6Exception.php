<?php

namespace PhpValueObjects\Network\Exception;

class InvalidIpv6Exception extends \Exception
{
    /**
     * InvalidIpv6Exception constructor.
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid ipv6 address.', $value));
    }
}
