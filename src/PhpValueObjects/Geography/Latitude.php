<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;

abstract class Latitude extends AbstractValueObject
{
    protected const MIN_LATITUDE = -90;
    protected const MAX_LATITUDE = 90;

    public function __construct(float $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        if ($value < self::MIN_LATITUDE || $value > self::MAX_LATITUDE) {
            $this->throwException($value);
        }
    }
}
