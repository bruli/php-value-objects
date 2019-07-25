<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class Ipv6Test extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnIpv6Address(): void
    {
        $ipAddress = $this->faker()->ipv6;

        $ipv6 = new Ipv6($ipAddress);

        $this->assertSame($ipAddress, $ipv6->value());
    }

    public function invalidIpv6Provider(): array
    {
        return [
            [$this->faker()->ipv4],
            [$this->faker()->localIpv4],
        ];
    }

    /**
     * @test
     * @dataProvider invalidIpv6Provider
     */
    public function itShouldThrowsException(string $data): void
    {
        $this->expectException(\Exception::class);

        new Ipv6($data);
    }
}
