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

        $values = [];

        foreach ($value as $item) {
            $values[] = new PolygonValueObject($item);
        }

        $this->value = $this->getScalarValues($values);
    }

    /**
     * @param PolygonValueObject[] $values
     * @return array
     */
    private function getScalarValues(array $values)
    {
        $scalar = [];

        foreach ($values as $value) {
            $scalar[] = $value->value();
        }

        return $scalar;
    }
}
