<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Money;

use PhpValueObjects\Tests\ThrowException;

final class Currency extends \PhpValueObjects\Money\Currency
{
    use ThrowException;
}
