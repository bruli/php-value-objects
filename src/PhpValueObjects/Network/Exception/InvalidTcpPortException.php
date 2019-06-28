<?php

namespace PhpValueObjects\Network\Exception;

class InvalidTcpPortException extends \Exception
{
    /**
     * InvalidUrlException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%" is not a valid tcp port.', $value));
    }
}
