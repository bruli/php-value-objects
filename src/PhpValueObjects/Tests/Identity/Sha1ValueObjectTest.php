<?php

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidSha1Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

class Sha1ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnSha1()
    {
        $sha1 = $this->faker()->sha1;

        $sha1VO = new Sha1ValueObject($sha1);

        $this->assertSame($sha1, $sha1VO->value());
        $this->assertSame($sha1, $sha1VO->__toString());
    }

    /**
     * @return array
     */
    public function invalidSha1Provider()
    {
        return [
            [null],
            [$this->faker()->md5],
            [$this->faker()->sha256],
            [$this->faker()->text],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidSha1Provider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidSha1Exception::class);

        new Sha1ValueObject($data);
    }
}
