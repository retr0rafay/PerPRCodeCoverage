<?php

namespace SalesforceEng\Crumb;

class Cookie
{
    /**
     * Cookie name
     * @var string
     */
    protected $name;

    /**
     * Cookie value
     * @var string
     */
    protected $value;

    /**
     * Cookie domain
     * @var string
     */
    protected $domain;

    /**
     * HTTP only flag
     * @var boolean
     */
    protected $httpOnly = false;

    /**
     * Secure (HTTPS only) flag
     * @var boolean
     */
    protected $secure = false;

    /**
     * Path of the cookie
     * @var string
     */
    protected $path = '/';

    /**
     * Timeout in seconds
     * @var integer
     */
    protected $timeout = 3600;

    /**
     * Signing flag
     * @var boolean
     */
    protected $sign = false;

    /**
     * Signature postfix for signature cookie name
     * @var string
     */
    protected $signaturePostfix = '-hash';

    /**
     * Value for SameSite attribute
     * @var string
     */
    protected $sameSite = null;

    /**
     * Secret value for signature cookie generation
     * @var string
     */
    private $secret;

    /**
     * Concatenation operator for combined cookies
     * @var string
     */
    const CONTACT_OPERATOR = '||';

    /**
     * Init the object and set the name and value of the cookie
     * Also creates default settings based on environment
     *
     * @param string $name Name of cookie
     * @param string $value Cookie value
     */
    public function __construct($name, $value, $secret = null)
    {
        $this->setName($name);
        $this->setValue($value);

        if ($secret !== null) {
            $this->setSecret($secret);
        }

        $this->setDefaults();
    }

    /**
     * Get the current concatenation operator
     *
     * @return string Operator
     */
    public function getConcatOperator()
    {
        return self::CONTACT_OPERATOR;
    }

    /**
     * Get the "configuration" of the cookie and return
     * 	it as an array
     *
     * @return array Configuration information
     */
    public function getConfiguration()
    {
        $configuration = [
            'domain' => $this->domain,
            'path' => $this->path,
            'httpOnly' => $this->httpOnly,
            'secure' => $this->secure,
            'timeout' => $this->timeout,
            'sign' => $this->sign
        ];

        if (!is_null($this->sameSite)) {
            $configuration['sameSite'] = $this->sameSite;
        }

        return $configuration;
    }

    /**
     * Set the secret for the cookie
     *
     * @var string $secret Secret value
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * Set up some defaults for the cookie (just host value for now)
     */
    public function setDefaults()
    {
        // Set up the domain if it's not given
        if ($this->domain === null) {
            $host = $_SERVER['HTTP_HOST'];

            // First remove any ports
            if (strpos($host, ':') !== false) {
                $host = substr($host, 0, strrpos($host, ':'));
            }
            $hostParts = explode('.', $host);
            $this->domain = implode('.', array_slice($hostParts, -2));
        }
    }

    /**
     * Static method to create a new instance of the Cookie class
     *
     * @param string $name Name of the cookie
     * @param string $value Value to set on the cookie
     * @return SalesforceEng\Crumb\Cookie instance
     */
    public static function instance($name, $value)
    {
        return new Cookie($name, $value);
    }

    /**
     * Set a cookie with the provided data (if not passed in, pulls
     * from the current cookie object)
     *
     * @param string $name Name of the cookie [optional]
     * @param string $value Value of the cookie [optional]
     */
    public function set($name = null, $value = null)
    {
        $name = ($name === null) ? $this->getName() : $name;
        $value = ($value === null) ? $this->getValue() : $value;

        // If it's not a string we need to ask the cookie to transform it for us
        if (!is_string($value) && method_exists($this, 'transform') === true) {
            $value = $this->transform($value);
        }

        if ($name == null) {
            throw new \InvalidArgumentException('Name cannot be null!');
        }
        if ($value == null) {
            throw new \InvalidArgumentException('Value cannot be null!');
        }

        $result = setcookie(
            $name,
            $value,
            time() + $this->getTimeout(),
            $this->path,
            $this->domain,
            $this->secure,
            $this->httpOnly
        );

        if ($this->sign === true) {
            $this->signCookie($this);
        }

        return $result;
    }

    /**
     * Delete the cookie with the provided name and value
     *
     * @return boolean Success/fail status of setcookie call
     */
    public function delete()
    {
        $name = $this->getName();
        $value = $this->getValue();

        return setcookie(
            $name,
            $value,
            time() - 86400,
            $this->path,
            $this->domain,
            $this->secure,
            $this->httpOnly
        );
    }

    /**
     * Set the name value for the cookie
     *
     * @param string $name Cookie name
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the current cookie name
     *
     * @return string Cookie name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the current cookie value
     *
     * @param string $value Set the value for the cookie
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get the current cookie value
     *
     * @param boolean $raw Return the raw/parsed value
     * @return string Cookie value
     */
    public function getValue($raw = true)
    {
        return $this->value;
    }

    /**
     * Get the current cookie's domain
     *
     * @return string Domain setting
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set the cookie's domain value
     *
     * @param string $domain Domain string
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * Get the cookie's current path
     *
     * @param string $path Path for the cookie
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Return the current path value
     *
     * @return string Cookie path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the "secure" setting on the cookie (HTTPS only)
     * If the status isn't provided, sets to true
     * If the status is given, evaluates for boolean and sets to that value
     *
     * @param boolean $status Secure status [optional]
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setSecure($status = null)
    {
        if ($status !== null) {
            if (!is_bool($status)) {
                throw new \InvalidArgumentException('Invalid status value for secure setting');
            }
            $this->secure = $status;
        } elseif ($status === null) {
            $this->secure = true;
        }
        return $this;
    }

    /**
     * Check to see if the current cookie is secure
     *
     * @return boolean Secure/not secure status
     */
    public function isSecure()
    {
        return $this->secure;
    }

    /**
     * Set the HTTP Only option for the cookie
     * If the status value is set, evaluated for a boolean and set
     * If the status is not set, sets to true
     *
     * @param boolean $status Status of the setting [optional]
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setHttpOnly($status = true)
    {
        if (!is_bool($status)) {
            throw new \InvalidArgumentException('Invalid status value for HTTP only setting');
        }
        $this->httpOnly = $status;
        return $this;
    }

    /**
     * Check to see if the current cookie is "HTTP Only"
     *
     * @return boolean Is/is not HTTP only
     */
    public function isHttpOnly()
    {
        return $this->httpOnly;
    }

    /**
     * Set the "signed" status of the cookie
     * If the status value is set, evaluated for boolean and set
     * If not set, the flag is set to true
     *
     * @param boolean $status Status flag [optional]
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function sign($status = null)
    {
        if ($status !== null) {
            if (!is_bool($status)) {
                throw new \InvalidArgumentException('Invalid status value for signing setting');
            }
            $this->sign = $status;
        } elseif ($status === null) {
            $this->sign = true;
        }
        return $this;
    }

    /**
     * Check to see if the cookie should be signed
     *
     * @return boolean Signed status
     */
    public function isSigned()
    {
        return ($this->sign === true) ? true : false;
    }

    /**
     * Set the cookie's timeout value
     *
     * @param integer $timeout Timeout in seconds
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function setTimeout($timeout)
    {
        if (!is_int($timeout)) {
            throw new \InvalidArgumentException('Timeout must be an integer value!');
        }
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Get the current timeout value
     *
     * @return integer Timeout in seconds
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set the value of the SameSite attribute
     *
     * @param string $sameSite
     */
    public function setSameSite($sameSite)
    {
        $this->sameSite = $sameSite;
    }

    /**
     * Get the value of the SameSite attribute
     *
     * @return string
     */
    public function getSameSite()
    {
        return $this->sameSite;
    }

    /**
     * Get the current signature name postfix value
     *
     * @return string Postfix value
     */
    public function getPostfix()
    {
        return $this->signaturePostfix;
    }

    /**
     * Update the cookie value (includes push to the actual cookie)
     *
     * @param string $value New cookie value
     * @return \SalesforceEng\Crumb\Cookie instance
     */
    public function updateCookie($value)
    {
        $name = $this->getName();

        $result = $this->set($name, $value);
        $this->setValue($value);
        return $this;
    }

    /**
     * Detect if the current cookie has a matching "signature" cookie
     * If the cookie is passed in that is use rather than the current instance
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie instance [optional]
     * @return boolean Has/does not have a signature
     */
    public function hasSignature(Cookie $cookie = null)
    {
        $cookie = ($cookie === null) ? $this : $cookie;

        // First see if the hash is embedded in the cookie value
        if (strstr($cookie->getValue(), $cookie->getConcatOperator()) !== false) {
            return true;
        }

        // Then look for the other hashed cookie
        $name = $cookie->getName().$this->signaturePostfix;
        return isset($_COOKIE[$name]);
    }

    /**
     * Make the hash of the cookie value and return it
     * If a cookie is passed in, that is used instead of the current cookie
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return string Hashed value
     */
    public function makeSignatureHash($nonce = null, Cookie $cookie = null)
    {
        if (empty($this->secret)) {
            throw new \InvalidArgumentException('Secret value cannot be empty!');
        }
        $cookie = ($cookie !== null) ? $cookie : $this;
        $nonce = ($nonce !== null) ? $nonce : sha1(\random_bytes(256));
        $value = $cookie->getValue();

        return $nonce.hash_hmac('sha256', $nonce.$value, $this->secret);
    }

    /**
     * Get the name for the signature cookie
     *
     * @return string Cookie name
     */
    public function getSignatureCookieName()
    {
        return $this->getName().$this->signaturePostfix;
    }

    /**
     * Create the cookie with the signed/hashed value
     *
     * @param \SalesforceEng\Crumb\Cookie $cookie Cookie instance
     * @return boolean Set() result for the signature cookie
     */
    public function signCookie(Cookie $cookie)
    {
        $hash = $this->makeSignatureHash(null, $cookie);
        $name = $this->getSignatureCookieName();

        $signCookie = Cookie::instance($name, $hash);
        if ($this->isHttpOnly()) {
            $signCookie->setHttpOnly();
        }
        return $signCookie->set();
    }

    /**
     * Verify the cookie signature comparing the current cookie
     * against the value of the signature cookie passed in
     *
     * @param mixed cookie Cookie instance or the signature string itself
     * @return boolean Match/no match result
     */
    public function verify($signature)
    {
        $signature = ($signature instanceof Cookie) ? $signature->getValue() : $signature;

        // Split off the nonce (sha1)
        $nonce = substr($signature, 0, 40);
        $hash = $this->makeSignatureHash($nonce, $this);

        return ($hash === $signature);
    }
}
