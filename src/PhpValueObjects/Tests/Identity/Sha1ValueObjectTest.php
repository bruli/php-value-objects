<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidSha1Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class Sha1ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnSha1(): void
    {
        $sha1 = $this->faker()->sha1;

        $sha1VO = new Sha1ValueObject($sha1);

        $this->assertSame($sha1, $sha1VO->value());
        $this->assertSame($sha1, $sha1VO->__toString());
    }

    public function invalidSha1Provider(): array
    {
        return [
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
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(InvalidSha1Exception::class);

        new Sha1ValueObject($data);
    }
}
