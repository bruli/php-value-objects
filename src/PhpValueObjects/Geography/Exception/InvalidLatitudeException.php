<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography\Exception;

use Exception;

final class InvalidLatitudeException extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a la valid latitude.', $value));
    }
}
