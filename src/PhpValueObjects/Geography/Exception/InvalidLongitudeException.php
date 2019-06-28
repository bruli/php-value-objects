<?php

namespace PhpValueObjects\Geography\Exception;

class InvalidLongitudeException extends \Exception
{
    /**
     * InvalidLongitudeException constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid longitude.', $value));
    }
}
