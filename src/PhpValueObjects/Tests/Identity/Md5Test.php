<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class Md5Test extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnMd5Hash(): void
    {
        $md5Hash = $this->faker()->md5;

        $md5VO = new Md5($md5Hash);

        $this->assertSame($md5Hash, $md5VO->value());
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
        $this->expectException(\Exception::class);

        new Md5($data);
    }
}
