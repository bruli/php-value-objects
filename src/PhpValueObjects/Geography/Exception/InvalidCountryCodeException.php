<?php

namespace PhpValueObjects\Geography\Exception;

class InvalidCountryCodeException extends \Exception
{
    /**
     * InvalidCountryCodeException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid country code.', $value));
    }
}
