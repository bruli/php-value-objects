<?php

namespace PhpValueObjects\Tests;

use Faker\Factory;
use Faker\Generator;

abstract class BaseUnitTestCase extends \PHPUnit_Framework_TestCase
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
