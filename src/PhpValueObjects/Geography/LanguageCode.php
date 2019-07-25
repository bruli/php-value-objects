<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractValueObject;
use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Languages;

abstract class LanguageCode extends AbstractValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
    }

    protected function guard($value): void
    {
        try {
            Languages::getName($value);
        } catch (MissingResourceException $exception) {
            $this->throwException($value);
        }
    }
}
