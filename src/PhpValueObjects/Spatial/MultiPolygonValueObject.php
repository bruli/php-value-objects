<?php

namespace PhpValueObjects\Spatial;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Spatial\Exception\InvalidMultiPolygonException;

class MultiPolygonValueObject extends AbstractValueObject
{
    public function __construct($value)
    {
        if (false === $this->guardNullable($value)) {
            $this->guard($value);
        }
    }

    /**
     * @param mixed $value
     * @throws InvalidMultiPolygonException
     */
    protected function guard($value)
    {
        if (false === is_array($value)) {
            throw new InvalidMultiPolygonException();
        }

        if (1 === count($value)) {
            throw new InvalidMultiPolygonException();
        }

        $values = [];

        foreach ($value as $item) {
            $values[] = new PolygonValueObject($item);
        }

        $this->value = $values;
    }
}
