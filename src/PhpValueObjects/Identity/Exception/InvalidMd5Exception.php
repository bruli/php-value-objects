<?php

namespace PhpValueObjects\Identity\Exception;

class InvalidMd5Exception extends \Exception
{
    /**
     * InvalidMd5Exception constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid md5 hash.', $value));
    }
}
