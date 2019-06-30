<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidUrlException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class UrlValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUrl(): void
    {
        $url = $this->faker()->url;

        $urlVO = new UrlValueObject($url);

        $this->assertSame($url, $urlVO->value());
        $this->assertSame($url, $urlVO->__toString());
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
        $this->expectException(InvalidUrlException::class);

        new UrlValueObject($data);
    }
}
