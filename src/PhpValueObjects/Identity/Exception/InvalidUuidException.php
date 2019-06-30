<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity\Exception;

use Exception;

final class InvalidUuidException extends Exception
{
    public function __construct($value)
    {
        parent::__construct(sprintf('"%s" is not a valid uuid.', $value));
    }
}
