<?php

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidSha256Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

class Sha256ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnSha256()
    {
        $sha256 = $this->faker()->sha256;

        $sha256VO = new Sha256ValueObject($sha256);

        $this->assertSame($sha256, $sha256VO->value());
        $this->assertSame($sha256, $sha256VO->__toString());
    }

    /**
     * @return array
     */
    public function invalidSha256Provider()
    {
        return [
            [null],
            [$this->faker()->md5],
            [$this->faker()->sha1],
            [$this->faker()->text],
        ];
    }

    /**
     * @test
     * @dataProvider invalidSha256Provider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidSha256Exception::class);

        new Sha256ValueObject($data);
    }
}
