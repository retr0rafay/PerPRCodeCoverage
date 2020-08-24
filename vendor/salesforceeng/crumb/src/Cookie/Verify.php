<?php

namespace SalesforceEng\Crumb\Cookie;

class Verify extends \SalesforceEng\Crumb\Cookie
{
    /**
     * Set up the Verify cookie with the necessary values
     * then call parent constructor
     *
     * @param string $name Cookie name
     * @param string $value Cookie value
     */
    public function __construct($name, $value, $secret)
    {
        $name .= $this->signaturePostfix;
        $this->setValue($value);
        $this->setSecret($secret);
        
        $value = $this->makeSignatureHash();

        parent::__construct($name, $value);
    }
}
