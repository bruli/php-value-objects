<?php

namespace PhpValueObjects\Money\Exception;

class InvalidCurrencyException extends \Exception
{
    /**
     * InvalidCurrencyException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid currency data.', $value));
    }
}
