<?php

namespace PhpValueObjects\Geography\Exception;

class InvalidLocaleException extends \Exception
{
    /**
     * InvalidLocaleException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid locale.', $value));
    }
}
