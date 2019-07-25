<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use PhpValueObjects\AbstractValueObject;

abstract class Md5 extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        if (false === (bool)preg_match('/^[a-f0-9]{32}$/', $value)) {
            $this->throwException($value);
        }
    }
}
