<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Collection;

use PhpValueObjects\Collection\ObjectCollection;

final class Collection extends ObjectCollection
{
    protected function setClassName(): string
    {
        return ObjectForTest::class;
    }
}
