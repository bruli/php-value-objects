<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class Ipv4Test extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnIpv4Address(): void
    {
        $ipAddress = $this->faker()->ipv4;

        $ipv4 = new Ipv4($ipAddress);

        $this->assertSame($ipAddress, $ipv4->value());
    }

    public function invalidIpv4AddressProvider(): array
    {
        return [
            [$this->faker()->ipv6]
        ];
    }

    /**
     * @test
     * @dataProvider invalidIpv4AddressProvider
     */
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new Ipv4($data);
    }
}
