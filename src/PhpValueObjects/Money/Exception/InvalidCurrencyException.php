<?php

declare(strict_types=1);

namespace PhpValueObjects\Money\Exception;

use Exception;

final class InvalidCurrencyException extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a valid currency data.', $value));
    }
}
