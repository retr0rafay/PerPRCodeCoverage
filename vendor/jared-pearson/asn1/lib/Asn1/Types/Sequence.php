<?php
namespace Asn1\Types;

use Asn1\LengthUtilities;
use Asn1\Type;

class Sequence implements Type
{
    /** @var string */
    private $encodedContent;

    /** @var int */
    private $contentLength;

    public function __construct(Type... $children)
    {
        $this->contentLength = self::calculateContentLength(...$children);
        $this->encodedContent = self::encodeContent(...$children);
    }

    public function getBinary(): string
    {
        $contentLength = $this->getContentLength();
        
        // 0x30 is type identifier for Sequence in x.690
        $result = chr(0x30);
        $result .= LengthUtilities::encodeLength($contentLength);
        $result .= $this->getEncodedContent();
        return $result;
    }

    public function getContentLength(): int
    {
        return $this->contentLength;
    }

    private function getEncodedContent()
    {
        return $this->encodedContent;
    }

    private static function encodeContent(Type... $children): string
    {
        $result = '';
        foreach($children as $child) {
            $result .= $child->getBinary();
        }
        return $result;
    }

    private static function calculateContentLength(Type... $children): int
    {
        // each object is comprised of {identifier}{length}{content} so
        // the length is all of them together
        $result = 0;
        foreach($children as $child) {
            $contentLength = $child->getContentLength();

            // size of identifier of the child should always be 2bytes
            $result += strlen(chr(0x00));

            $result += LengthUtilities::calculateNumberOfOctets($contentLength);
            $result += $contentLength;
        }
        return $result;
    }
}