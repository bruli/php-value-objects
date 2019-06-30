<?php

declare(strict_types=1);

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidLanguageCodeException;
use Symfony\Component\Intl\Exception\MissingResourceException;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Intl\Languages;

abstract class LanguageCode extends AbstractStringValueObject
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
            throw new InvalidLanguageCodeException($value);
        }
    }
}
