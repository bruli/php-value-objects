<?php

namespace PhpValueObjects;

abstract class AbstractValueObject
{
    /**
     * @var mixed
     */
    protected $value;
    /**
     * AbstractValueObject constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (false === $this->guardNullable($value)) {
            $this->guard($value);
        }

        $this->value = $value;
    }

    /**
     * @param mixed $value
     */
    abstract protected function guard($value);

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function guardNullable($value)
    {
        return is_null($value) && $this instanceof NullableInterface;
    }
}
