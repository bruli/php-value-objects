<?php

namespace PhpValueObjects\Collection\Exception;

class InvalidCollectionObjectException extends \Exception
{
    /**
     * InvalidCollectionObjectException constructor.
     * @param object $actual
     * @param string $expected
     */
    public function __construct($actual, $expected)
    {
        parent::__construct(
            sprintf('"%s" is not a valid object for collection. Expected "%s"', get_class($actual), $expected)
        );
    }
}
