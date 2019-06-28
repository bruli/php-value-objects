<?php

namespace PhpValueObjects\Network\Exception;

class InvalidUrlException extends \Exception
{
    /**
     * InvalidUrlException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%" is not a valid url.', $value));
    }
}
