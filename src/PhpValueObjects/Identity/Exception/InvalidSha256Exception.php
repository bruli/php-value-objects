<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity\Exception;

use Exception;

final class InvalidSha256Exception extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a valid sha256 hash.', $value));
    }
}
