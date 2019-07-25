<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Collection;

final class ObjectForTest
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
