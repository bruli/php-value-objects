<?php

namespace PhpValueObjects\Tests\Network;

use PhpValueObjects\Network\Exception\InvalidUrlException;
use PhpValueObjects\Tests\BaseUnitTestCase;

class UrlValueObjectTest extends BaseUnitTestCase
{
    /**
     * @test
     */
    public function itShouldReturnUrl()
    {
        $url = $this->faker()->url;

        $urlVO = new UrlValueObject($url);

        $this->assertSame($url, $urlVO->value());
        $this->assertSame($url, $urlVO->__toString());
    }

    /**
     * @return array
     */
    public function invalidUrlProvider()
    {
        return [
            [null],
            [$this->faker()->email],
            [$this->faker()->phoneNumber],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidUrlProvider
     */
    public function itShouldThrowsException($data)
    {
        $this->expectException(InvalidUrlException::class);

        new UrlValueObject($data);
    }
}
