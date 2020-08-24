<?php

namespace SalesforceEng\Crumb;
use SalesforceEng\Crumb\Cookie;

abstract class Adapter
{
    /**
     * Cookie instance
     * @var \SalesforceEng\Crumb\Cookie
     */
    protected $cookie;

    /**
     * Init the object and set the current cookie instance
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     */
    public function __construct(Cookie $cookie)
    {
        $this->setCookie($cookie);
    }

    /**
     * Static method to create a new Adapter instance
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return \SalesforceEng\Crumb\Adapter instance
     */
    public static function instance(Cookie $cookie)
    {
        $class = get_called_class();
        return new $class($cookie);
    }

    /**
     * Set the current Cookie instance
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return \SalesforceEng\Crumb\Adapter instance
     */
    public function setCookie(Cookie $cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }

    /**
     * Get the current Cookie instance
     *
     * @return \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     */
    public function getCookie()
    {
        return $this->cookie;
    }
}
