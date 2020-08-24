<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\OctetString;

class OctetStringTest extends TestCase
{
    /**
     * @dataProvider getValidValues
     */
    public function testOctetStringWithValidValue(string $value, string $expectedInHex): void
    {
        $actual = (new OctetString($value))->getBinary();
        $actualInHex = bin2hex($actual);
        $this->assertEquals($expectedInHex, $actualInHex);
    }

    public function getValidValues()
    {
        return array(
            array("0123456789abcdef", "04080123456789abcdef")
        );
    }
}