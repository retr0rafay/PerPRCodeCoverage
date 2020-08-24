<?php
namespace Asn1\Types;

use Asn1\LengthUtilities;
use Asn1\Type;

class OctetString implements Type
{
    /** @var string */
    private $encodedContent;

    /** @var int */
    private $contentLength;

    /** @var int */
    private $encodedLength;

    /**
     * @param $value string This should be a hexidecimal string
     */
    public function __construct(string $value)
    {
        // make sure the string contains complete octets
        if (strlen($value) % 2 == 1) {
            $value = '0'.$value;
        }

        $this->encodedContent = self::encodeContent($value);
        $this->contentLength = strlen($value) / 2;
        $this->encodedLength = LengthUtilities::encodeLength($this->contentLength);
    }

    public function getBinary(): string
    {
        $result = $this->getIdentifier();
        $result .= $this->getEncodedLength();
        $result .= $this->getEncodedContent();
        return $result;
    }

    protected function getIdentifier(): string
    {
        // 0x04 is type identifier for OctetString in x.690
        return chr(0x04);
    }

    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    protected function getEncodedLength(): string
    {
        return $this->encodedLength;
    }

    protected function getEncodedContent(): string
    {
        return $this->encodedContent;
    }

    private static function encodeContent(string $value): string
    {
        $result = '';
        while (strlen($value) >= 2) {
            // encode each octet from hex string
            $result .= chr(hexdec(substr($value, 0, 2)));
            $value = substr($value, 2);
        }
        return $result;
    }
}
