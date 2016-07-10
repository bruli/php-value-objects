<?php

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidIpv6Exception;
use PhpValueObjects\Tests\BaseUnitTestCase;

class Ipv6ValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnIpv6Address()
    {
        $ipAddress = $this->faker()->ipv6;

        $ipv6 = new Ipv6ValueObject($ipAddress);

        $this->assertSame($ipAddress, $ipv6->value());
        $this->assertSame($ipAddress, $ipv6->__toString());
    }

    /**
     * @return array
     */
    public function invalidIpv6Provider()
    {
        return [
            [null],
            [$this->faker()->ipv4],
            [$this->faker()->localIpv4],
            [$this->faker()->numberBetween()],
        ];
    }

    /**
     * @test
     * @dataProvider invalidIpv6Provider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidIpv6Exception::class);

        new Ipv6ValueObject($data);
    }
}
