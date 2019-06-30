<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidMd5Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class Md5ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnMd5Hash(): void
    {
        $md5Hash = $this->faker()->md5;

        $md5VO = new Md5ValueObject($md5Hash);

        $this->assertSame($md5Hash, $md5VO->value());
        $this->assertSame($md5Hash, $md5VO->__toString());
    }

    public function invalidMd5HashProvider(): array
    {
        return [
            [$this->faker()->sha1],
            [$this->faker()->sha256],
            [$this->faker()->text],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidMd5HashProvider
     */
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(InvalidMd5Exception::class);

        new Md5ValueObject($data);
    }
}
