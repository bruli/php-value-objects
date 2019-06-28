<?php

namespace PhpValueObjects\Geography\Exception;

class InvalidLanguageCodeException extends \Exception
{
    /**
     * InvalidLanguageCodeException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid language code.', $value));
    }
}
