<?php
namespace Asn1\Types;

use Asn1\BigInteger;
use Asn1\LengthUtilities;
use Asn1\Type;

class ObjectIdentifier implements Type
{
    /** @var int */
    private $contentLength;

    /** @var string */
    private $encodedContent;

    public function __construct(string $value)
    {
        $parts = explode('.', $value);

        // ISO/IEC 8825-1:2015 (8.19.4) requires that the first two
        // values be combined
        if (count($parts) >= 2) {
            $newFirstValue = (intval($parts[0]) * 40) + intval($parts[1]);
            array_splice($parts, 0, 2, array($newFirstValue));
        }

        $this->encodedContent = self::encodeContent($parts);
        $this->contentLength = strlen($this->encodedContent);
    }

    public function getBinary(): string
    {
        // 0x06 is the ObjectIdentifier identifier in x.690
        $result = chr(0x06);
        $result .= LengthUtilities::encodeLength($this->contentLength);
        $result .= $this->encodedContent;
        return $result;
    }

    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    private static function encodeContent(array $values): string
    {
        $result = '';
        foreach($values as $part) {
            $result .= self::encodePart($part);
        }
        return $result;
    }

    private static function encodePart(string $value): string
    {
        // base128 encode
        $mod = 128;
        $octets = chr(bcmod($value, $mod));
        $value = BigInteger::shiftRight($value, 7);
        while (bccomp($value, '0') > 0) {
            $octetInt = (int)bcmod($value, $mod);

            # 8.19.2 requires that bit 8 of each octet be 1
            $octets .= chr(0x80 | $octetInt);

            $value = BigInteger::shiftRight($value, 7);
        }
        return strrev($octets);
    }
}