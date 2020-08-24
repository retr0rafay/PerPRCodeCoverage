<?php
namespace Asn1\Types;

use Asn1\LengthUtilities;

class BitString extends OctetString
{
    public function __construct($value)
    {
        if (gettype($value) == 'integer') {
            parent::__construct(dechex($value));
        } else {
            // assume it's a string that is in hex
            parent::__construct($value);
        }
    }

    protected function getIdentifier(): string
    {
        // 0x03 is type identifier for BitString in x.690
        return chr(0x03);
    }

    public function getContentLength(): int
    {
        // bit string has an extra octet
        return parent::getContentLength() + 1;
    }

    protected function getEncodedLength(): string
    {
        return LengthUtilities::encodeLength($this->getContentLength());
    }

    protected function getEncodedContent(): string
    {
        // bit string has "number of unused bits" for the first octect,
        // which is not used
        $content = parent::getEncodedContent();
        return chr(0x00).$content;
    }
}
