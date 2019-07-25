<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\ThrowException;

final class Sha256 extends \PhpValueObjects\Identity\Sha256
{
    use ThrowException;
}
