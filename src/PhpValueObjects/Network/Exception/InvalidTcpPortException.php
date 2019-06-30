<?php

declare(strict_types=1);

namespace PhpValueObjects\Network\Exception;

use Exception;

final class InvalidTcpPortException extends Exception
{
    public function __construct($value)
    {
        parent::__construct(sprintf('"%" is not a valid tcp port.', $value));
    }
}
