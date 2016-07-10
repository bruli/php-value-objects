<?php

namespace PhpValueObjects\Geography;

use PhpValueObjects\AbstractStringValueObject;
use PhpValueObjects\Geography\Exception\InvalidLanguageCodeException;
use Symfony\Component\Intl\Intl;

abstract class LanguageCode extends AbstractStringValueObject
{
    /**
     * @param mixed $value
     *
     * @throws InvalidLanguageCodeException
     */
    protected function guard($value)
    {
        $languageName = Intl::getLanguageBundle()->getLanguageName($value);

        if (null === $languageName) {
            throw new InvalidLanguageCodeException($value);
        }
    }
}
