<?php

namespace SalesforceEng\Crumb;

class CookieJar
{
    protected $cookies = [];
    protected $types = [];

    public function __construct(array $cookies = [])
    {
        if (!empty($cookies)) {
            $this->load($cookies);
        }
    }
    public function load(array $cookies)
    {
        foreach ($cookies as $index => $cookie) {
            if (!($cookie instanceof Cookie)) {
                $cookie = new Cookie($index, $cookie);
            }

            $this->add($cookie, true);
        }
    }
    public function setTypes(array $types)
    {
        $this->types = $types;
    }
    public function findType($name)
    {
        return (isset($this->types[$name])) ? $this->types[$name] : null;
    }
    public function loadCurrent()
    {
        foreach ($_COOKIE as $index => $cookie) {
            $type = $this->findType($index);

            if ($type !== null) {
                $cookieNs = '\\SalesforceEng\\Crumb\\Cookie\\'.ucwords(strtolower($type));
                if (!class_exists($cookieNs)) {
                    throw new \InvalidArgumentException('Invalid cookie type: '.$type);
                }
                $cookieInstance = new $cookieNs($index, $cookie);
            } else {
                $cookieInstance = new Cookie($index, $cookie);
            }

            $this->add($cookieInstance);
        }
    }
    public function add(Cookie $cookie, $overwrite = false)
    {
        $name = $cookie->getName();
        $this->cookies[$name] = $cookie;

        if ($overwrite === true) {
            $this->cookies[$name]->updateCookie($cookie->getValue());
        }
    }
    public function get($name = null)
    {
        if ($name == null) {
            return $this->cookies;
        }
        if (!isset($this->cookies[$name])) {
            return false;
        }
        return $this->cookies[$name];
    }

    public function exists($name)
    {
        return (isset($this->cookies[$name]));
    }
}
