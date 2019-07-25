<?php

declare(strict_types=1);

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Tests\BaseUnitTestCase;

final class TcpPortTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnTcpPort(): void
    {
        $portNumber = $this->faker()->numberBetween(0, 65535);

        $tcpPort = new TcpPort($portNumber);

        $this->assertSame($portNumber, $tcpPort->value());
    }

    public function invalidTcpPortProvider(): array
    {
        return [
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
        $this->expectException(\Exception::class);

        new TcpPort($data);
    }
}
