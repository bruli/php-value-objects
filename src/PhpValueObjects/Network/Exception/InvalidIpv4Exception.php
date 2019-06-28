<?php

namespace PhpValueObjects\Network\Exception;

class InvalidIpv4Exception extends \Exception
{
    /**
     * InvalidIpv4Exception constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid ipv4 address.', $value));
    }
}
