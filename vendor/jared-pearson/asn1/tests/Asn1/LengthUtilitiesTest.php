<?php
declare(strict_types=1);

namespace Asn1;

use PHPUnit\Framework\TestCase;
use Asn1\LengthUtilities;

class LengthUtilitiesTest extends TestCase
{
    /**
     * @dataProvider getValidEncodeLengths
     */
    public function testEncodeLength(int $value, string $expectedInHex)
    {
        $actual = LengthUtilities::encodeLength($value);
        $actualInHex = bin2hex($actual);
        $this->assertEquals($expectedInHex, $actualInHex);
    }

    public function getValidEncodeLengths(): array
    {
        return array(
            // short-form
            array(1,   '01'),
            array(127, '7f'),
            // long-form
            array(128, '8180'),
            array(201, '81c9')
        );
    }

    /**
     * @dataProvider getValidNumberOfOctets
     */
    public function testCalculateNumberOfOctets(int $value, int $expected)
    {
        $actual = LengthUtilities::calculateNumberOfOctets($value);
        $this->assertEquals($expected, $actual);
    }

    public function getValidNumberOfOctets(): array
    {
        return array(
            array(1, 1),
            array(127, 1),
            array(128, 2),
            array(201, 2)
        );
    }
}