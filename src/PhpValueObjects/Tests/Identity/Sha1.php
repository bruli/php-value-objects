<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\ThrowException;

final class Sha1 extends \PhpValueObjects\Identity\Sha1
{
    use ThrowException;
}
