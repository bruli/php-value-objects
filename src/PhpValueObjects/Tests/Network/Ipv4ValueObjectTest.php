<?php

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidIpv4Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

class Ipv4ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnIpv4Address()
    {

        $ipAddress = $this->faker()->ipv4;

        $ipv4 = new Ipv4ValueObject($ipAddress);

        $this->assertSame($ipAddress, $ipv4->value());
        $this->assertSame($ipAddress, $ipv4->__toString());
    }

    /**
     * @return array
     */
    public function invalidIpv4AddressProvider()
    {
        return [
            [null],
            [$this->faker()->numberBetween()],
            [$this->faker()->ipv6]
        ];
    }

    /**
     * @test
     * @dataProvider invalidIpv4AddressProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidIpv4Exception::class);

        new Ipv4ValueObject($data);
    }
}
