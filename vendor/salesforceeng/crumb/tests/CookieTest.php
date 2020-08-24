<?php

namespace SalesforceEng\Crumb;

class CookieTest extends \PHPUnit_Framework_TestCase
{
    private $cookie;
    private $secret = '(BfrH6cI(^2MnPO(V.h%V0ykRmks7LVwhJYE5jP!B4QfCD46Q%o@ThH%hPTi,nLP';

    public function setUp()
    {
        $_SERVER['HTTP_HOST'] = 'test.localhost.com';
        $this->cookie = new Cookie('test-cookie', 'testing1234');
    }

    /**
     * Test the init of the object and that the name/value
     * 	are set correctly
     */
    public function testInitObjectWithNameValue()
    {
        $name = 'test-cookie';
        $value = 'testing1234';
        $cookie = new Cookie($name, $value);

        $this->assertEquals($name, $cookie->getName());
        $this->assertEquals($value, $cookie->getValue());
    }

    /**
     * Test the set up of the default domain value based on the
     * 	current HTTP_HOST value
     */
    public function testDefaultDomainSetup()
    {
        $_SERVER['HTTP_HOST'] = 'foo.bar.com:8181';
        $cookie = new Cookie('test-cookie', 'testing1234');

        $this->assertEquals('bar.com', $cookie->getDomain());
    }

    /**
     * Test the get/set of the domain value
     */
    public function testGetSetDomain()
    {
        $this->cookie->setDomain('localhost1.com');
        $this->assertEquals('localhost1.com', $this->cookie->getDomain());
    }

    /**
     * Test the setting of a cookie to HTTP Only
     */
    public function testSetHttpOnly()
    {
        $this->cookie->setHttpOnly();
        $this->assertTrue($this->cookie->isHttpOnly());

        $this->cookie->setHttpOnly(false);
        $this->assertFalse($this->cookie->isHttpOnly());
    }

    /**
     * Test that the exception is thrown when a bad value (non-boolean)
     * 	is given to the setHttpOnly method
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetHttpOnlyBadValue()
    {
        $this->cookie->setHttpOnly('bad-value');
    }

    /**
     * Test the changing of the signing status on the cookie
     */
    public function testSetSigningStatus()
    {
        $this->cookie->sign();
        $this->assertTrue($this->cookie->isSigned());

        $this->cookie->sign(false);
        $this->assertFalse($this->cookie->isSigned());
    }

    /**
     * Test the submission of a bad value to the "sign" method
     *
     * @expectedException \InvalidArgumentException
     */
    public function testBadSignValueType()
    {
        $this->cookie->sign('bad-value');
    }

    /**
     * Test the getter/setter on the timeout handling
     */
    public function testGetSetTimeoutValue()
    {
        $timeout = 1000;
        $this->cookie->setTimeout($timeout);
        $this->assertEquals($timeout, $this->cookie->getTimeout());
    }

    /**
     * Test trying to set the timeout to a non-integer value
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetTimeoutBadValue()
    {
        $this->cookie->setTimeout('bad-value');
    }

    /**
     * Test fetching the hard-coded cookie postfix name value
     */
    public function testGetPostfixValue()
    {
        $this->assertEquals('-hash', $this->cookie->getPostfix());
    }

    /**
     * Test the check to see if the cookie has a matching "signature" cookie
     */
    public function testHasSignature()
    {
        $cookie = new Cookie('test', '1234');
        $_COOKIE['test'.$cookie->getPostfix()] = hash('sha256', 'foobarbaz');

        $this->assertTrue($cookie->hasSignature($cookie));
    }

    /**
     * Test the cookie value to see if the hash is attached (post-concat operator)
     */
    public function testHasSignatureNoConcat()
    {
        $cookie = new Cookie('test', null);
        $hash = '1234'.$cookie->getConcatOperator().hash('sha256', 'foobarbaz');
        $cookie->setValue($hash);

        $this->assertTrue($cookie->hasSignature($cookie));
    }

    /**
     * Test the generation of the signature hash value
     */
    public function testSignatureHashGeneration()
    {
        $cookie = new Cookie('test', '1234', $this->secret);

        $hash1 = $cookie->makeSignatureHash();
        $nonce = substr($hash1, 0, 40);

        $this->assertEquals($hash1, $cookie->makeSignatureHash($nonce));
    }

    /**
     * Test the verification of the signature hash cookie (prevents tampering)
     */
    public function testVerifySignatureHash()
    {
        $cookie = new Cookie('test', '1234');
        $cookie->setSecret($this->secret);

        $hash = $cookie->makeSignatureHash();
        $signatureCookie = new Cookie('test-hash', $hash);
        $signatureCookie->setSecret($this->secret);

        $this->assertTrue($cookie->verify($signatureCookie));
    }

    /**
     * Ensure an exception is thrown when no secret value is defined
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSignatureHashGenerationNoSecret()
    {
        $cookie = new Cookie('test', '1234');
        $cookie->makeSignatureHash();
    }

    /**
     * Test the creation and return of the matching signature cookie name
     */
    public function testGetSignatureCookieName()
    {
        $name = 'test';
        $cookie = new Cookie($name, '1234');
        $this->assertEquals(
            $name.$cookie->getPostfix(),
            $cookie->getSignatureCookieName()
        );
    }

    /**
     * Test that an instance is returned from the static instance()
     * 	call and is configured correctly (name/value)
     */
    public function testInstanceReturned()
    {
        $cookie = Cookie::instance('test', '1234');

        $this->assertInstanceOf('\SalesforceEng\Crumb\Cookie', $cookie);
        $this->assertEquals('test', $cookie->getName());
        $this->assertEquals('1234', $cookie->getValue());
    }

    /**
     * Test that all configuration values are returned from the
     * 	getConfiguration method call
     */
    public function testGetConfiguration()
    {
        $set = ['domain', 'path', 'httpOnly', 'secure', 'timeout', 'sign'];
        $config = Cookie::instance('test', '1234')->getConfiguration();

        $diff = array_diff($set, array_keys($config));
        $this->assertEmpty($diff, 'Configuration values are missing from return');
    }

    /**
     * Test setting the cookie path on its configuration
     * 	Default is '/'
     */
    public function testSetCookiePath()
    {
        $path = '/foo/bar';
        $cookie = Cookie::instance('test', '1234');
        $cookie->setPath($path);

        $this->assertEquals($path, $cookie->getConfiguration()['path']);
    }

    /**
     * Test setting the cookie to secure without a value
     * 	Causes it to set it to true
     */
    public function testSetSecureWithoutValue()
    {
        $cookie = Cookie::instance('test', '1234');
        $cookie->setSecure();

        $this->assertEquals(true, $cookie->getConfiguration()['secure']);
    }

    /**
     * Test the setting of the secure flag on a cookie
     * 	Default is false
     */
    public function testSetSecureWithValue()
    {
        $secure = true;
        $cookie = Cookie::instance('test', '1234');

        $cookie->setSecure($secure);
        $this->assertEquals($secure, $cookie->getConfiguration()['secure']);
    }

    /**
     * Test the setting of the "secure" flag with a non-boolean value
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetSecureBadValue()
    {
        Cookie::instance('test', '1234')->setSecure('bad-value');
    }

    /**
     * Test that an exception is thrown when the name is somehow null
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetNoName()
    {
        $cookie = Cookie::instance('test', '1234');
        $cookie->setName(null);

        $cookie->set();
    }

    /**
     * Test that an exception is thrown when the value is null
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetNoValue()
    {
        $cookie = Cookie::instance('test', '1234');
        $cookie->setValue(null);

        $cookie->set();
    }

    /**
     * Test the modification of the cookie value with the transform method
     */
    public function testTransformCookieValue()
    {
        $value = ['test5432' => true];
        $cookie = new CookieWithTrans('test0987', $value);

        $this->assertEquals(
            'eyJ0ZXN0NTQzMiI6dHJ1ZX0=',
            $cookie->transform($cookie->getValue())
        );
    }

    /**
     * Test the setting of the SameSite flag on a cookie
     * 	Default is false
     */
    public function testSetSameSiteWithValue()
    {
        $sameSite = 'none';
        $cookie = Cookie::instance('test', '1234');

        $cookie->setSameSite($sameSite);
        $this->assertEquals($sameSite, $cookie->getConfiguration()['sameSite']);
    }

}

// Class for testing
class CookieWithTrans extends \SalesforceEng\Crumb\Cookie
{
    public function transform($value)
    {
        return base64_encode(json_encode($value));
    }
    public function translate($value)
    {
        return json_decode(base64_decode($value));
    }
}
