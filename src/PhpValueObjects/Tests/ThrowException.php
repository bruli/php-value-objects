<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests;

trait ThrowException
{
    protected function throwException($value): void
    {
        throw new \Exception((string)$value);
    }
}
