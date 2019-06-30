<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidTcpPortException;
use PhpValueObjects\Tests\BaseUnitTestCase;

final class TcpPortValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnTcpPort(): void
    {
        $portNumber = $this->faker()->numberBetween(0, 65535);

        $tcpPort = new TcpPortValueObject($portNumber);

        $this->assertSame($portNumber, $tcpPort->value());
    }

    public function invalidTcpPortProvider(): array
    {
        return [
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
    public function itShouldThrowsException($data): void
    {
        $this->expectException(InvalidTcpPortException::class);

        new TcpPortValueObject($data);
    }
}
