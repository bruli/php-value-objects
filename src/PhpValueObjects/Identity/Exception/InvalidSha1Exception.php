<?php

namespace PhpValueObjects\Identity\Exception;

class InvalidSha1Exception extends \Exception
{
    /**
     * InvalidSha1Exception constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid sha1 hash.', $value));
    }
}
