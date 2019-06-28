<?php

namespace PhpValueObjects\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

abstract class BaseUnitTestCase extends TestCase
{
    /**
     * @var Generator
     */
    private $faker;

    /**
     * @return Generator
     */
    protected function faker()
    {
        return $this->faker = $this->faker ?: Factory::create();
    }
}
