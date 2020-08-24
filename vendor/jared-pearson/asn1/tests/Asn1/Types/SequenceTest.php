<?php
declare(strict_types=1);

namespace Asn1\Types;

use PHPUnit\Framework\TestCase;
use Asn1\Types\Integer;
use Asn1\Types\Sequence;

class SequenceTest extends TestCase
{
    public function testSequenceWithValidValue(): void
    {
        $encodedValue = (new Sequence(
            new Integer((string)256)
        ))->getBinary();
        $actualInHex = bin2hex($encodedValue);
        $this->assertEquals('300402020100', $actualInHex);
    }

    public function testSequenceWithTwoValues(): void
    {
        $encodedValue = (new Sequence(
            new Integer((string)256),
            new Integer((string)256)
        ))->getBinary();
        $actualInHex = bin2hex($encodedValue);
        $this->assertEquals('30080202010002020100', $actualInHex);
    }
}