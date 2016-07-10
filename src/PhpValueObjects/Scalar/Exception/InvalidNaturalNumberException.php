<?php

namespace PhpValueObjects\Scalar\Exception;

class InvalidNaturalNumberException extends \Exception
{
    /**
     * InvalidNaturalNumberException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid natural number.', $value));
    }
}
