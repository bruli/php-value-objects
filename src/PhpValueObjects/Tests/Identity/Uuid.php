<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\ThrowException;

final class Uuid extends \PhpValueObjects\Identity\Uuid
{
    use ThrowException;
}
