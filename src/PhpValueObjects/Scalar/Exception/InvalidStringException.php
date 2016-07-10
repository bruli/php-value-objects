<?php

namespace PhpValueObjects\Scalar\Exception;

class InvalidStringException extends \Exception
{
    /**
     * InvalidStringException constructor.
     * @param string $value
     */
    public function __construct($value)
    {
        $message = sprintf('"%s" is not a valid string', $value);
        parent::__construct($message);
    }
}
