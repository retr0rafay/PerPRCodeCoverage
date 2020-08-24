<?php

namespace SalesforceEng\Crumb\Adapter;

class Symfony1SameSite extends \SalesforceEng\Crumb\Adapter
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

        $path = $cookie->getPath();
        if (!empty($cookie->getSameSite())) {
            $path .= "; SameSite={$cookie->getSameSite()}";
        }

        $response->setCookie(
            $cookie->getName(),
            $cookie->getValue(),
            $cookie->getTimeout(),
            $path,
            $cookie->getDomain(),
            $cookie->isSecure(),
            $cookie->isHttpOnly()
        );
    }
}
