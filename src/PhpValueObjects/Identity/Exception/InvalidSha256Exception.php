<?php

namespace PhpValueObjects\Identity\Exception;

class InvalidSha256Exception extends \Exception
{
    /**
     * InvalidSha256Exception constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid sha256 hash.', $value));
    }
}
