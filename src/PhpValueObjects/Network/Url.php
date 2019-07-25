<?php

declare(strict_types=1);

namespace PhpValueObjects\Network;

use PhpValueObjects\AbstractValueObject;

abstract class Url extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            $this->throwException($value);
        }
    }
}
