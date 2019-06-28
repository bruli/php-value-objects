<?php

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidTcpPortException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class TcpPortValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnTcpPort()
    {
        $portNumber = $this->faker()->numberBetween(0, 65535);

        $tcpPort = new TcpPortValueObject($portNumber);

        $this->assertSame($portNumber, $tcpPort->value());
    }

    /**
     * @return array
     */
    public function invalidTcpPortProvider()
    {
        return [
            [null],
            [11362.0],
            [$this->faker()->randomFloat()],
            [$this->faker()->numberBetween(65536)],
            [-$this->faker()->numberBetween()],
        ];
    }

    /**
     * @test
     * @dataProvider invalidTcpPortProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidTcpPortException::class);

        new TcpPortValueObject($data);
    }
}
