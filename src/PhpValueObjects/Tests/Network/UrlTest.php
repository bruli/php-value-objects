<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class UrlTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUrl(): void
    {
        $url = $this->faker()->url;

        $urlVO = new Url($url);

        $this->assertSame($url, $urlVO->value());
    }

    public function invalidUrlProvider(): array
    {
        return [
            [$this->faker()->email],
            [$this->faker()->phoneNumber],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidUrlProvider
     */
    public function itShouldThrowsException(string $data): array
    {
        $this->expectException(\Exception::class);

        new Url($data);
    }
}
