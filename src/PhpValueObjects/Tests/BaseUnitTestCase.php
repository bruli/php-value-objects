<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

abstract class BaseUnitTestCase extends TestCase
{
    private $faker;

    protected function faker(): Generator
    {
        return $this->faker = $this->faker ?: Factory::create();
    }
}
