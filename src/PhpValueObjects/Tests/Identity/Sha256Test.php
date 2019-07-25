<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class Sha256Test extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnSha256(): void
    {
        $sha256 = $this->faker()->sha256;

        $sha256VO = new Sha256($sha256);

        $this->assertSame($sha256, $sha256VO->value());
    }

    public function invalidSha256Provider(): array
    {
        return [
            [$this->faker()->md5],
            [$this->faker()->sha1],
            [$this->faker()->text],
        ];
    }

    /**
     * @test
     * @dataProvider invalidSha256Provider
     */
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new Sha256($data);
    }
}
