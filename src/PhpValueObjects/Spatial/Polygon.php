<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial;

use PhpValueObjects\Spatial\Exception\InvalidPolygonException;

class Polygon
{
    private $value;
    public function __construct(array $value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    public function value(): array
    {
        return $this->value;
    }

    protected function guard($value): void
    {
        if (3 > count($value)) {
            throw new InvalidPolygonException();
        }

        $first = $value[0];
        $end = end($value);

        foreach ($value as $point) {
            if (false === is_array($point)) {
                throw new InvalidPolygonException();
            }

            if (2 !== count($point)) {
                throw new InvalidPolygonException();
            }
        }

        if (false === ($first == $end)) {
            throw new InvalidPolygonException();
        }
    }
}
