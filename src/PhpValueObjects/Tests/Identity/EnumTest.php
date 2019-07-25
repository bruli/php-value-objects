<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Tests\BaseUnitTestCase;

class EnumTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldThrowInvalidEnumException(): void
    {
        $this->expectException(\Exception::class);
        new Enum('invalid');
    }

    /**
     * @test
     */
    public function itShouldReturnEnumValue(): void
    {
        $data = Enum::VALID;
        $value = new Enum($data);

        $this->assertSame($data, $value->value());
    }
}
