<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Spatial\Exception\InvalidMultiPolygonException;

class MultiPolygonValueObject extends AbstractValueObject
{
    public function __construct($value)
    {
        if (null !== $value) {
            $this->guard($value);
        }
    }

    protected function guard($value): void
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
    private function getScalarValues(array $values): array
    {
        $scalar = [];

        foreach ($values as $value) {
            $scalar[] = $value->value();
        }

        return $scalar;
    }
}
