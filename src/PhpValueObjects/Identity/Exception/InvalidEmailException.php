<?php

namespace PhpValueObjects\Identity\Exception;

class InvalidEmailException extends \Exception
{
    /**
     * InvalidEmailException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid email.', $value));
    }
}
