<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\NullType;

class NullTypeTest extends TestCase
{
    public function testNullTypeWithValidValue()
    {
        $encodedValue = (new NullType())->getBinary();
        $actualInHex = bin2hex($encodedValue);
        $this->assertEquals("0500", $actualInHex);
    }
}