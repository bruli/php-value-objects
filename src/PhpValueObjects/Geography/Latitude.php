<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;
use PhpValueObjects\Geography\Exception\InvalidLatitudeException;

abstract class Latitude extends AbstractValueObject
{
    const MIN_LATITUDE = -90;
    const MAX_LATITUDE = 90;

    /**
     * @param mixed $value
     * @throws InvalidLatitudeException
     */
    protected function guard($value): void
    {
        if (false === is_float($value) || $value < self::MIN_LATITUDE || $value > self::MAX_LATITUDE) {
            throw new InvalidLatitudeException($value);
        }
    }
}
