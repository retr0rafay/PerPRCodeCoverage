<?php

namespace SalesforceEng\Crumb;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    private $defaultSecret = 'pNVHK.YjukmJTtVFx]tjLAT#,hg!K38Zi98Rh86wBcCC99hh,E$9jl7rg5I\1lc&';

    public function setUp()
    {
        $_SERVER['HTTP_HOST'] = 'test.localhost.com';
    }

    public function tearDown()
    {
        $_COOKIE = [];
    }

    private function makeManager($secret = null)
    {
        $secret = ($secret !== null) ? $secret : $this->defaultSecret;
        $manager = new Manager($secret);
        return $manager;
    }

    /**
     * Test the get/set of the secret value (on init and using get/set)
     */
    public function testGetSetSecret()
    {
        $manager = $this->makeManager();
        $this->assertEquals($this->defaultSecret, $manager->getSecret());

        $other = 'pNVHK.YjukmJTtVFx]tjLAT#,hg!K38Zi98Rh86wBcCC99hh,E$9jl7rg5I\1lc&';
        $manager = $this->makeManager($other);
        $manager->setSecret($other);
        $this->assertEquals($other, $manager->getSecret());
    }

    /**
     * Test the result of the "instance()" method call
     */
    public function testGetInstance()
    {
        $manager = Manager::instance($this->defaultSecret);

        $this->assertInstanceOf('\SalesforceEng\Crumb\Manager', $manager);
        $this->assertEquals($this->defaultSecret, $manager->getSecret());
    }

    /**
     * Test that the "exists" method returns correctly for set vs
     * not set cookies.
     *
     * @runInSeparateProcess
     */
    public function testCheckCookieExistsValid()
    {
        $cookies = [
            'test-cookie1' => 'testing123'
        ];
        $manager = Manager::instance($this->defaultSecret, $cookies);

        $this->assertTrue($manager->exists('test-cookie1'));
        $this->assertFalse($manager->exists('bad-cookie-name'));
    }

    /**
     * Test the get/check of the "sign all" requirement flag
     */
    public function testSignAllRequirement()
    {
        $manager = Manager::instance($this->defaultSecret);

        $manager->signAll();
        $this->assertTrue($manager->areAllSigned());

        $manager->signAll(false);
        $this->assertFalse($manager->areAllSigned());
    }

    /**
     * Test the set/check of the "verification required" setting
     */
    public function testVerifyRequired()
    {
        $manager = Manager::instance($this->defaultSecret);

        $manager->forceVerify();
        $this->assertTrue($manager->isVerifyEnforced());

        $manager->forceVerify(false);
        $this->assertFalse($manager->isVerifyEnforced());
    }

    /**
     * Test that an exception is thrown when a bad (non-boolean) value
     * 	is given to the forceVerify method
     *
     * @expectedException \InvalidArgumentException
     */
    public function testVerifyRequiredBadValue()
    {
        $manager = Manager::instance($this->defaultSecret);
        $manager->forceVerify('bad-value');
    }

    /**
     * Test the comparison method handling
     */
    public function testComparisonMethodValid()
    {
        $matchSignature = 'e09395b7ce046e9635b2ca1733e58c0d00f660baa86ae9d3a810'
            .'546806d800ba929cb741c8808d8cab22c8fd8b837265bd2b19ef';
        $_COOKIE['test1'] = '1234';
        $_COOKIE['test1-hash'] = $matchSignature;

        $manager = Manager::instance($this->defaultSecret);
        $manager->splitCookies();

        $result = $manager->compare('test1', function($cookie, $signature) use ($matchSignature) {
            return ($matchSignature == $signature);
        });

        $this->assertTrue($result);
    }

    /**
     * Test the comparison handling when the `setCompare` method is used
     */
    public function testComparisonMethodSetValid()
    {
        $matchSignature = 'e09395b7ce046e9635b2ca1733e58c0d00f660baa86ae9d3a810'
            .'546806d800ba929cb741c8808d8cab22c8fd8b837265bd2b19ef';
        $_COOKIE['test1'] = '1234';
        $_COOKIE['test1-hash'] = $matchSignature;
        $secret = 'ZGJYh}wqAxUxH9Tp6QurugsYq>(Go&g';

        $manager = Manager::instance($this->defaultSecret);
        $manager->splitCookies();
        $manager->setCompare(function($cookie, $signature) use ($matchSignature) {
            return ($matchSignature == $signature);
        });
        $result = $manager->compare('test1');

        $this->assertTrue($result);
    }

    /**
     * Test the throwing of an exception when no comparison handler is set
     *
     * @expectedException \Exception
     */
    public function testComparisonInvalidHandler()
    {
        $manager = Manager::instance($this->defaultSecret);
        $manager->compare('test1');
    }

    /**
     * Test the false being returned when a cookie isn't found
     */
    public function testGetInvalidCookieName()
    {
        $manager = Manager::instance($this->defaultSecret);
        $this->assertFalse($manager->get('bad-cookie-name'));
    }

    /**
     * Test the exception being thrown when "force verify" is set
     * and the signature hash cookie is not present
     *
     * @expectedException \SalesforceEng\Crumb\Exception\SignatureNotFoundForce
     */
    public function testCookieMissingSignatureHashForceVerify()
    {
        $_COOKIE = [
            'testcookie1' => 'thisvaluedoesnotmatter'
        ];
        $manager = Manager::instance($this->defaultSecret);
        $manager->setFailOnError(true)
            ->forceVerify()
            ->get('testcookie1');
    }

    /**
     * Test that the exception is thrown when the hash/signature cookie isn't found
     */
    public function testGetSignatureNotFoundNotForced()
    {
        $value = 'thisvaluedoesnotmatter';
        $_COOKIE = [
            'testcookie2' => $value
        ];
        $manager = Manager::instance($this->defaultSecret, []);
        $manager->setFailOnError(true);

        $this->assertEquals($value, $manager->get('testcookie2'));
    }

    /**
     * Test that the exception is thrown when the signature does not validate
     *
     * @expectedException \SalesforceEng\Crumb\Exception\SignatureNotVerified
     */
    public function testGetSignatureDoesNotVerify()
    {
        $cookie = new Cookie('test', '1234');
        $_COOKIE = [
            'testcookie3' => 'thisvaluedoesnotmatter'.$cookie->getConcatOperator().'esthis'
        ];
        $manager = Manager::instance($this->defaultSecret);
        $manager->setFailOnError(true);

        $manager->get('testcookie3');
    }

    /**
     * Test that false is returned when the cookie does not exist
     */
    public function testGetCookieDoesNotExist()
    {
        $manager = Manager::instance($this->defaultSecret);
        $cookie = $manager->getCookie('testing1234');

        $this->assertFalse($cookie);
    }

    /**
     * Test that the return from getCookie (when the cookie is defined)
     * returns a Cookie instance and that its value is correct
     */
    public function testGetCookieObject()
    {
        $_COOKIE['testing1234'] = 'foobarbaz';

        $manager = Manager::instance($this->defaultSecret);
        $cookie = $manager->getCookie('testing1234');

        $this->assertInstanceOf('\SalesforceEng\Crumb\Cookie', $cookie);
        $this->assertEquals('foobarbaz', $cookie->getValue());
    }
}
