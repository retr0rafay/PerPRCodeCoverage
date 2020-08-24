<?php
namespace Asn1\Types;

use Asn1\Type;

class NullType implements Type
{
    public function getBinary(): string
    {
        // 0x05 is the Null identifier in x.690
        // 0x00 is content length of zero
        return chr(0x05).chr(0x00);
    }

    public function getContentLength(): int
    {
        return 0;
    }
}