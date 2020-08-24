<?php
namespace Asn1;

class LengthUtilities
{
    /**
     * Given a length as an integer, returns the encoded value. This method
     * follows the 8.1.3 of ITU-T X.690 (2015).
     */
    public static function encodeLength(int $contentLength): string
    {
        if ($contentLength < 128) {
            // short form encoding
            return chr($contentLength);
        } else {
            // long form encoding (multiple octets)
            $numberOfOctets = self::calculateNumberOfOctets($contentLength);
            $octets = chr(0x80 | ($numberOfOctets - 1));
            for ($shift = 8 * ($numberOfOctets - 2); $shift >= 0; $shift -= 8) {
                $octets .= chr($contentLength >> $shift);
            }
            return $octets;
        }
    }

    /**
     * Given an integer value, returns the number of octets needed to
     * represent the integer. This is useful when determining the size
     * of a value without encoding the value.
     */
    public static function calculateNumberOfOctets(int $value): int
    {
        $numberOfOctets = 1;
        if ($value >= 128) { // two complement has max of 127
            do {
                $numberOfOctets++;
                $value = $value >> 8;
            } while ($value > 0);
        }
        return $numberOfOctets;
    }
}