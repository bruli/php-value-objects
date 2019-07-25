<?php

declare(strict_types=1);

namespace PhpValueObjects\Identity;

use Assert\Assertion;
use Exception;
use PhpValueObjects\AbstractValueObject;

abstract class Uuid extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        try {
            Assertion::uuid($value);
        } catch (Exception $e) {
            $this->throwException($value);
        }
    }
}
