<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\BitString;

class BitStringTest extends TestCase
{
    /**
     * @dataProvider getValidValues
     */
    public function testBitStringWithValidValue(int $value, string $expectedInHex): void
    {
        $actual = (new BitString($value))->getBinary();
        $actualInHex = bin2hex($actual);
        $this->assertEquals($expectedInHex, $actualInHex);
    }

    public function getValidValues()
    {
        return array(
            array(0xFF, "030200ff"),
            array(0xFFA034, "030400ffa034")
        );
    }
}