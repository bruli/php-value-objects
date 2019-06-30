<?php

declare(strict_types=1);

namespace PhpValueObjects\Network\Exception;

use Exception;

final class InvalidUrlException extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%" is not a valid url.', $value));
    }
}
