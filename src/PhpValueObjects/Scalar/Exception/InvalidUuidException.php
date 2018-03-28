<?php

namespace PhpValueObjects\Scalar\Exception;

class InvalidUuidException extends \Exception
{
    /**
     * InvalidUuidException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid Uuid value for "%s"', $value));
    }
}
