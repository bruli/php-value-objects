<?php

namespace PhpValueObjects\Collection;

use PhpValueObjects\Collection\Exception\InvalidCollectionObjectException;

abstract class ObjectCollection
{
    /**
     * @var array
     */
    private $objects;

    /**
     * ObjectCollection constructor.
     * @param array $objects
     * @throws InvalidCollectionObjectException
     */
    public function __construct(array $objects)
    {
        foreach ($objects as $object) {
            if (false === is_a($object, $this->setClassName())) {
                throw new InvalidCollectionObjectException($object, $this->setClassName());
            }
        }
        $this->objects = $objects;
    }

    /**
     * @return string
     */
    abstract protected function setClassName();

    /**
     * @return array
     */
    public function getCollection()
    {
        return $this->objects;
    }

}
