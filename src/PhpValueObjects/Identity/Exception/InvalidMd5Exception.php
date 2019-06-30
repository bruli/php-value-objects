<?php
declare(strict_types=1);

namespace PhpValueObjects\Identity\Exception;

use Exception;

final class InvalidMd5Exception extends Exception
{
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a valid md5 hash.', $value));
    }
}
