<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\ObjectIdentifier;

class ObjectIdentifierTest extends TestCase
{
    /**
     * @dataProvider getObjectIdentifierValidValues
     */
    public function testObjectIdentifier(string $value, string $expectedInHex)
    {
        $actual = (new ObjectIdentifier($value))->getBinary();
        $actualInHex = bin2hex($actual);
        $this->assertEquals($expectedInHex, $actualInHex);
    }

    public function getObjectIdentifierValidValues(): array
    {
        return array(
            array('1.2.840.113549', '06062a864886f70d'),
            array('2.999.3', '0603883703'),
            array('2.1.1', '06025101'),
        );
    }
}