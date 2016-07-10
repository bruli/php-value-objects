<?php

namespace PhpValueObjects\Geography\Exception;

class InvalidLatitudeException extends \Exception
{
    /**
     * InvalidLatitudeException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a la valid latitude.', $value));
    }
}
