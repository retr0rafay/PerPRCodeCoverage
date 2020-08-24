<?php

namespace SalesforceEng\Crumb\Adapter;

class Symfony1 extends \SalesforceEng\Crumb\Adapter
{
    /**
     * Use the provided response object and set the cookie using
     * 	the "setCookie" method
     *
     * @param sfWebResponse $response Symfony 1 Response object
     */
    public function set(&$response)
    {
        $cookie = $this->getCookie();

        $response->setCookie(
            $cookie->getName(),
            $cookie->getValue(),
            $cookie->getTimeout(),
            $cookie->getPath(),
            $cookie->getDomain(),
            $cookie->isSecure(),
            $cookie->isHttpOnly()
        );
    }
}
