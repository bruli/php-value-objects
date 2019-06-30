<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography\Exception;

use Exception;

final class InvalidLongitudeException extends Exception
{
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid longitude.', $value));
    }
}
