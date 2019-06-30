<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidIpv4Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class Ipv4ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnIpv4Address(): void
    {

        $ipAddress = $this->faker()->ipv4;

        $ipv4 = new Ipv4ValueObject($ipAddress);

        $this->assertSame($ipAddress, $ipv4->value());
        $this->assertSame($ipAddress, $ipv4->__toString());
    }

    public function invalidIpv4AddressProvider(): array
    {
        return [
            [$this->faker()->numberBetween()],
            [$this->faker()->ipv6]
        ];
    }

    /**
     * @test
     * @dataProvider invalidIpv4AddressProvider
     */
    public function itShouldThrowsException($data): void
    {
        $this->expectException(InvalidIpv4Exception::class);

        new Ipv4ValueObject($data);
    }
}
