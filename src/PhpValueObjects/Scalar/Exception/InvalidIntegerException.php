<?php

namespace PhpValueObjects\Scalar\Exception;

class InvalidIntegerException extends \Exception
{
    /**
     * InvalidIntegerException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid integer.', $value));
    }
}
