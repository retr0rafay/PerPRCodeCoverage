<?php
namespace Asn1\Types;

use Asn1\BigInteger;
use Asn1\LengthUtilities;
use Asn1\Type;

class Integer implements Type
{
    /** @var string */
    private $encodedContent;

    /** @var int */
    private $contentLength;

    public function __construct(string $value)
    {
        $this->encodedContent = self::encodeContent($value);
        $this->contentLength = strlen($this->encodedContent);
    }

    public function getBinary(): string
    {
        // 0x02 is type identifier for Integer in x.690
        $result = chr(0x02);
        $result .= LengthUtilities::encodeLength($this->contentLength);
        $result .= $this->encodedContent;
        return $result;
    }

    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    private function getEncodedContent(): string
    {
        return $this->encodedContent;
    }

    private static function encodeContent(string $value): string
    {
        $negative = bccomp($value, '0') < 0;
        if ($negative) {
            $value = bcmul($value, '-1'); // absolute value
            $limit = 0x80; // two complement has min of -128
        } else {
            $limit = 0x7f; // two complement has max of 127
        }

        $mod = 256;
        $values = [];
        while (bccomp($value, $limit) > 0) {
            $values[] = (int)bcmod($value, $mod);
            $value = BigInteger::shiftRight($value, 8); // bit shift right one octet
        }
        $values[] = (int)bcmod($value, $mod);
        
        if ($negative) {
            $numberOfValues = count($values);
            for ($i = 0; $i < $numberOfValues; $i++) {
                $values[$i] = 0xff - $values[$i]; // twos complement
            }
            for ($i = 0; $i < $numberOfValues; $i++) {
                $values[$i] += 1; // twos complement
                if ($values[$i] <= 0xff) {
                    break;
                }
                $values[$i] = 0;
            }

            // spec requires that the first bit of a negative number be FF
            // since the array is backwards, we append it
            if ($values[$numberOfValues - 1] == 0x7f) {
                $values[] = 0xff;
            }
        }
        $values = array_reverse($values);
        return pack("C*", ...$values);
    }

}