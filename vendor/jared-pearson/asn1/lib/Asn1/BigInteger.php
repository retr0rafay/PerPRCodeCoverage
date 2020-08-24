<?php
namespace Asn1;

class BigInteger 
{
    /**
     * Shift the value specified by the specified amount of bits to the right. This method
     * is useful when working with large numbers.
     */
    public static function shiftRight(string $value, int $amount): string
    {
        return bcdiv($value, bcpow('2', (string)$amount));
    }

    /**
     * Shift the value specified by the specified amount of bits to the left. This method
     * is useful when working with large numbers.
     */
    public static function shiftLeft(string $value, int $amount): string
    {
        return bcmul($value, bcpow('2', (string)$amount));
    }
}