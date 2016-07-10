<?php

namespace PhpValueObjects\Scalar\Exception;

class InvalidFloatException extends \Exception
{
    /**
     * InvalidFloatException constructor.
     * @param string $value
     */
    public function __construct($value)
    {
        $message = sprintf('"%s" is not a valid float', $value);
        parent::__construct($message);
    }
}
