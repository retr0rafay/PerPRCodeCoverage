<?php
declare(strict_types=1);

namespace Asn1;

use PHPUnit\Framework\TestCase;
use Asn1\BigInteger;

class BigIntegerTest extends TestCase
{
    /**
     * @dataProvider getShiftRightValues
     */
    public function testShiftRight(string $value, int $amount, string $expected)
    {
        $actual = BigInteger::shiftRight($value, $amount);
        $this->assertEquals($expected, $actual);
    }

    public function getShiftRightValues(): array
    {
        return array(
            array('18', 1, '9'),   // 0001 0010 >> 1 = 1001
            array('128', 1, '64'), // 1000 0000 >> 1 = 0100 0000
            array('1024', 1, '512')// 0100 0000 0000 >> 1 = 0010 0000 0000
        );
    }
}
