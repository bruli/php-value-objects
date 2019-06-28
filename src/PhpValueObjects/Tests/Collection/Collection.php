<?php

namespace PhpValueObjects\Tests\Collection;

use PhpValueObjects\Collection\ObjectCollection;

class Collection extends ObjectCollection
{
    /**
     * @return string
     */
    protected function setClassName()
    {
        return ObjectForTest::class;
    }
}
