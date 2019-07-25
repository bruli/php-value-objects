<?php

declare(strict_types=1);

namespace PhpValueObjects\Spatial;

class MultiPolygon
{
    private $value;
    public function __construct(array $value)
    {
        $this->guard($value);
    }

    public function value(): array
    {
        return $this->value;
    }

    protected function guard(array $value): void
    {
        $values = [];

        foreach ($value as $item) {
            $values[] = new Polygon($item);
        }

        $this->value = $this->getScalarValues($values);
    }

    /**
     * @param Polygon[] $values
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
