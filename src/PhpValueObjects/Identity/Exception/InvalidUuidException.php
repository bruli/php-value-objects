<?php

namespace PhpValueObjects\Identity\Exception;

class InvalidUuidException extends \Exception
{
    /**
     * InvalidUuidException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid uuid.', $value));
    }
}
