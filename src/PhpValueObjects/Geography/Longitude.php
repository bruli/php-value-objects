<?php

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Geography\Exception\InvalidLongitudeException;

abstract class Longitude extends AbstractValueObject
{
    const MIN_LONGITUDE = -180;
    const MAX_LONGITUDE = 180;

    /**
     * @param mixed $value
     *
     * @throws InvalidLongitudeException
     */
    protected function guard($value)
    {
        if (false === is_float($value) || $value < self::MIN_LONGITUDE || $value > self::MAX_LONGITUDE) {
            throw new InvalidLongitudeException($value);
        }
    }
}
