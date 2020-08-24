<?php
namespace Asn1;

interface Type
{
    public function getBinary(): string;
    public function getContentLength(): int;
}