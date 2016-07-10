<?php

namespace PhpValueObjects;

abstract class AbstractStringValueObject extends AbstractValueObject
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
