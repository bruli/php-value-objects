<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;

abstract class Longitude extends AbstractValueObject
{
    const MIN_LONGITUDE = -180;
    const MAX_LONGITUDE = 180;

    public function __construct(float $value)
    {
        parent::__construct($value);
    }

    protected function guard($value):  void
    {
        if ($value < self::MIN_LONGITUDE || $value > self::MAX_LONGITUDE) {
            $this->throwException($value);
        }
    }
}
