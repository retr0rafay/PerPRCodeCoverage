<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\Integer;

class IntegerTest extends TestCase
{
    /**
     * @dataProvider getValidValues
     */
    public function testIntegerWithValidValue(int $value, string $expectedInHex)
    {
        $actual = (new Integer((string)$value))->getBinary();
        $actualInHex = bin2hex($actual);
        $this->assertEquals($expectedInHex, $actualInHex);
    }

    public function getValidValues() {
        return array(
            array(0, '020100'),
            array(127, '02017f'),
            array(128, '02020080'),
            array(256, '02020100'),
            array(-128, '020180'),
            array(-129, '0202ff7f')
        );
    }
}