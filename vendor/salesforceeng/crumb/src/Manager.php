<?php

namespace SalesforceEng\Crumb;

class Manager
{
    /**
     * Current CookieJar instance
     * @var \SalesforceEng\Crumb\CookieJar
     */
    private $cookieJar;

    /**
     * Sign all flag
     * @var boolean
     */
    private $signAll = false;

    /**
     * Force the verification of all cookies
     * @var boolean
     */
    private $forceVerify = false;

    /**
     * Comparison method
     * @var \Closure
     */
    private $compare;

    /**
     * Flag to split/combine the cookie and signature values
     * @var boolean
     */
    private $splitCookies = false;

    /**
     * Fail (throw exceptions) on signature errors
     */
    private $failOnError = false;

    /**
     * Cookie names and their related types
     */
    private $types = [];

    /**
     * Init the object and set up cookies if provided and load the
     * current cookies based on the flag
     *
     * @param string $secret Secret string to use in hashing
     * @param array $cookies Set of cookies/instances to load into the manager
     * @param boolean $load Load/do not load the current cookies (default true)
     * @param array $types Set of cookie name to type relations
     */
    public function __construct($secret, array $cookies = [], $load = true, $splitCookies = false, array $types = [])
    {
        if (strlen($secret) < 32 || strlen($secret) > 64) {
            throw new \InvalidArgumentException('Invalid secret length, must be between 32 and 64 bytes');
        }

        if (!empty($types)) {
            $this->setTypes($types);
        }

        $this->setSecret($secret);
        $this->cookieJar = new CookieJar();
        $this->cookieJar->setTypes($this->types);
        // First see if we need to load the current cookies
        if ($load === true) {
            $this->cookieJar->loadCurrent();
        }

        // Now, if any are provided load those
        if (!empty($cookies)) {
            $this->cookieJar->load($cookies);
        }

        $this->splitCookies($splitCookies);
    }

    /**
     * Method to make a new cookie and assign the secret to it
     *  (used for manual cookie creation)
     *
     * @param string $name Cookie name
     * @param string $value Coookie value
     * @param string $type Cookie type (ex: "Verify") [optional]
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function makeCookie($name, $value, $type = null)
    {
        $cookieNs = '\\SalesforceEng\\Crumb\\Cookie';
        if ($type !== null) {
            $cookieNs .= '\\'.ucwords(strtolower($type));
        }

        if (!class_exists($cookieNs)) {
            throw new \InvalidArgumentException('Invalid cookie type: '.$type);
        }

        $cookie = new $cookieNs($name, $value, $this->getSecret());

        if (method_exists($cookie, 'transform') === true) {
            $cookie->setValue($cookie->transform());
        }

        return $cookie;
    }

    /**
     * Set the "split" flag to see if we need to make a seperate
     * cookie for the hash or just concatenate
     *
     * @param boolean $status Enable/disable status
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function splitCookies($status = true)
    {
        $this->splitCookies = $status;
        return $this;
    }

    /**
     * Set the current secret value
     *
     * @var string $secret Secret value
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * Get the current secret value
     *
     * @return string Secret value
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Get the current setting for the "fail on error" flag
     *
     * @return boolean Flag status
     */
    public function getFailOnError()
    {
        return $this->failOnError;
    }

    /**
     * Set the "fail on error" status (throw exceptions vs return false)
     *
     * @param boolean $status Status flag for fail vs return
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function setFailOnError($status = false)
    {
        if (!is_bool($status)) {
            throw new \InvalidArgumentException('Invalid status value for fail on error');
        }
        $this->failOnError = $status;
        return $this;
    }

    /**
     * Add a type relationship between cookie name and type
     *
     * @param string $name Cookie name
     * @param string $type Cookie object type
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function addType($name, $type)
    {
        $this->types[$name] = $type;
        return $this;
    }

    /**
     * Find the type of cookie for the provided cookie name
     *
     * @param string $name Cookie name
     * @return string|null Either the type if found or null if not
     */
    public function findType($name)
    {
        return (isset($this->types[$name])) ? $this->types[$name] : null;
    }

    /**
     * Set the current types values
     *
     * @param array $types Set of cookie name to type relations
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
        return $this;
    }

    /**
     * Static method to return a new Manager instance
     *
     * @param string $secret Secret string to use in hashing
     * @param array $cookies Set of cookie values/instances [optional]
     * @param boolean $load Flag to load the current cookie values
     * @param array $types Set of cookie name to type relations
     *
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public static function instance($secret, array $cookies = [], $load = true, $splitCookies = false, array $types = [])
    {
        return new Manager($secret, $cookies, $load, $splitCookies, $types);
    }

    /**
     * Get the current cookie jar instance
     *
     * @return \SalesforceEng\Crumb\CookieJar instance
     */
    public function getJar()
    {
        return $this->cookieJar;
    }

    /**
     * Set the flag to sign all cookies created by this instance
     *
     * @param boolean $status Status to set on the flag
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function signAll($status = null)
    {
        if ($status === null) {
            $this->signAll = true;
        } elseif ($status === false) {
            $this->signAll = false;
        }
        return $this;
    }

    /**
     * See if the requirement to sign all cookies is set
     *
     * @return boolean Signing requirement status
     */
    public function areAllSigned()
    {
        return $this->signAll;
    }

    /**
     * See if the requirement to force the verification is enforced
     *
     * @return boolean Enforce verification flag status
     */
    public function isVerifyEnforced()
    {
        return $this->forceVerify;
    }

    /**
     * Force the verification of all cookies, requiring the hash signature cookies
     * to exist (flag). If the status input is not set, defaults to true.
     *
     * @param boolean $status Status to set [optional]
     * @return \SalesforceEng\Crumb\Manager instance
     */
    public function forceVerify($status = null)
    {
        if ($status !== null) {
            if (!is_bool($status)) {
                throw new \InvalidArgumentException('Invalid status value for verify enforcement');
            }
            $this->forceVerify = $status;
        } else {
            $this->forceVerify = true;
        }
        return $this;
    }

    /**
     * Set the cookie with the name and value. Optionally sign the cookie on set
     *
     * @param \SalesforceEng\Crumb\Cookie|string $name Name of the cookie or Cookie instance
     * @param string $value Value of the cookie [optional]
     *
     * @throws \InvalidArgumentException If the cookie does not exist
     * @throws \Exception If there was an error setting the cookie
     */
    public function set($name, $value = null, $sign = false)
    {
        if ($name instanceof Cookie) {
            $name = $cookie;
        } else {
            $type = $this->findType($name);
            $cookie = ($type === null) ? new Cookie($name, $value) : $this->makeCookie($name, $value, $type);
        }

        $cookie->setSecret($this->getSecret());

        if ($cookie->getName() === null || $cookie->getValue() === null) {
            throw new \InvalidArgumentException('Invalid cookie, name and value are required');
        }

        if ($this->splitCookies === true) {
            if ($cookie->set() === false) {
                throw new \Exception('Error setting cookie for "'.$cookie->getName().'"');
            }
            if ($sign === true || $cookie->isSigned() === true || $this->signAll === true) {
                $cookie->signCookie($cookie);
            }
        } else {
            if ($sign === true || $cookie->isSigned() === true || $this->signAll === true) {
                // Update the cookie value with the concatenated hash
                $hash = $cookie->makeSignatureHash(null, $cookie);
                $cookie->setValue($cookie->getValue().$cookie->getConcatOperator().$hash);
            }

            if ($cookie->set() === false) {
                throw new \Exception('Error setting cookie for "'.$cookie->getName().'"');
            }
        }

        $this->cookieJar->add($cookie);
    }

    /**
     * Delete the cookie with the provided name(s)
     * Can take in either an array of names or just one
     *
     * @param string|array $cookie Either an array of names or a single name
     * @param boolean $deleteSignature Delete the signature cookie (default to true)
     */
    public function delete($cookie, $deleteSignature = true)
    {
        if (!is_array($cookie)) {
            $cookie = [$cookie];
        }
        foreach ($cookie as $name) {
            // Get the cookie and remove it
            $result = $this->get($name);
            $c = new Cookie($name, $result);


            // Delete the signature if we have one
            if ($deleteSignature == true && $c->hasSignature() == true) {
                $signatureCookieName = $c->getSignatureCookieName();
                $signatureCookie = $this->getCookie($signatureCookieName);
                $signatureCookie->delete();
            }

            // Finally delete the cookie
            $c->delete();
        }
    }

    /**
     * Get the current cookie. Optionally specify if you
     * want the raw (un-transformed) version
     *
     * @param string $name Cookie NAme
     * @param boolean $raw Return raw or translated cookie, default translated [optional]
     *
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function getCookie($name, $raw = false)
    {
        $cookie = $this->cookieJar->get($name);
        if ($cookie === false) {
            return false;
        }

        if (method_exists($cookie, 'translate') && $raw === false) {
            $this->setValue($cookie->translate());
        }
        return $cookie;
    }

    /**
     * Get the value for the requested cookie
     * If the cookie has a matching signature, this is validated before the value is returned
     * If the "force verify" is enabled, cookies must have a signature or they fail
     *
     * @throws \Exception If signature is required but doesn't exist
     * @throws \Exception If signature cookie is not found
     * @throws \Exception If the signature couldn't be verified
     *
     * @return boolean|string Either false if cookie is not set, value if it's all good
     */
    public function get($name)
    {
        // Get the cookie from the jar
        $cookie = $this->cookieJar->get($name);
        if ($cookie === false) {
            if ($this->getFailOnError() === true) {
                throw new Exception\CookieNotFound('Cookie "'.$name.'" could not be found');
            } else {
                return false;
            }
        }

        $return = $cookie->getValue();
        $cookie->setSecret($this->getSecret());

        if ($this->forceVerify === true && $cookie->hasSignature() === false) {
            if ($this->getFailOnError() === true) {
                throw new Exception\SignatureNotFoundForce('Missing verification signature - fail!');
            } else {
                return false;
            }
        }

        // If it has a signature, verify it
        if ($cookie->hasSignature() === true) {
            if ($this->splitCookies === true) {
                $verifyReturn = $this->handleSplitCookies($cookie);
            } else {
                $verifyReturn = $this->handleSingleCookie($cookie);
            }

            if ($verifyReturn === false) {
                if ($this->getFailOnError() === true) {
                    throw new Exception\SignatureNotVerified('Signature for cookie "'.$cookie->getName().'" could not be verified');
                } else {
                    return false;
                }
            }
        }

        // If the cookie type proceides a "translate" method, call it to return
        // the data back to original form
        if (method_exists($cookie, 'translate')) {
            $return = $cookie->translate();
        }

        return $return;
    }

    /**
     * Check to see if a cookie with a given name exists in the cookie jar.
     *
     * @param string $cookieName Name of the cookie to check
     * @return boolean Cookie exists/does not exists
     */
    public function exists($cookieName)
    {
        return $this->cookieJar->exists($cookieName);
    }

    /**
     * Handle the verification of split cookies (one for value, other for signature)
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return boolean Pass/fail status of verification
     */
    private function handleSplitCookies(\SalesforceEng\Crumb\Cookie $cookie)
    {
        $signatureCookie = $this->cookieJar->get($cookie->getName().$cookie->getPostfix());
        if ($signatureCookie === false) {
            if ($this->getFailOnError() === true) {
                throw new Exception\SignatureNotFound('Signature cookie not found - did you turn off autoloading?');
            } else {
                return false;
            }
        }

        // Verify the cookie - if not verified throw an exception
        return $cookie->verify($signatureCookie);
    }

    /**
     * Handle the verification of a single cookie (value+signature)
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return boolean Pass/fail status of verification
     */
    private function handleSingleCookie(\SalesforceEng\Crumb\Cookie $cookie)
    {
        $cookieValue = $cookie->getValue();
        if (strstr($cookieValue, $cookie->getConcatOperator()) === false) {
            if ($this->getFailOnError() === true) {
                throw new Exception\InvalidCookieFormat('Format of cookie is invalid (missing delimiter)');
            } else {
                return false;
            }
        }
        // verify the hash
        list($return, $signature) = explode($cookie->getConcatOperator(), $cookieValue);
        $cookie->setValue($return);

        return $cookie->verify($signature);
    }

    /**
     * Execute the closure against the cookie and signature provided
     * and evaluate for a match. Closure should return a boolean for pass/fail
     *
     * @param string $cookieName Name of the cookie to find/verify
     * @param \Closure $handler Closure method to handle comparison [optional]
     * @throws \Exception If comparison in the closure has failed
     * @return boolean Pass/fail status of the closure evaluation
     */
    public function compare($cookieName, \Closure $handler = null)
    {
        $handler = ($handler === null) ? $this->compare : $handler;
        if ($handler === null) {
            throw new \Exception('Invalid comparison handler!');
        }

        $cookie = $this->getCookie($cookieName);
        $signature = $this->get($cookie->getName().$cookie->getPostfix());

        return $handler($cookie, $signature);
    }

    /**
     * Set the comparison function (Closure)
     *
     * @param \Closure $handler Closure instance
     */
    public function setCompare(\Closure $handler)
    {
        $this->compare = $handler;
    }
}
