<?php
declare(strict_types=1);

namespace PhpValueObjects\Tests\Identity;

use PhpValueObjects\Identity\Exception\InvalidEnumException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class EnumValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldThrowInvalidEnumException(): void
    {
        $this->expectException(InvalidEnumException::class);
        new EnumValueObject('invalid');
    }

    /**
     * @test
     */
    public function itShouldReturnEnumValue(): void
    {
        $data = EnumValueObject::VALID;
        $value = new EnumValueObject($data);

        $this->assertSame($data, $value->value());
    }
}
