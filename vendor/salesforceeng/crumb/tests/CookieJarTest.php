<?php

namespace SalesforceEng\Crumb;

class CookieJarTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $_SERVER['HTTP_HOST'] = 'localhost.com';
    }

    /**
     * Test the creation of the jar with cookie values passed in
     */
    public function testInitWithCookieValues()
    {
        $cookies = ['test' => 'foo'];
        $jar = new TestJar($cookies);
        $this->assertCount(1, $jar->get());
    }

    /**
     * Test the creation of the jar with no cookie values passed in
     */
    public function testInitNoCookies()
    {
        $jar = new TestJar();
        $this->assertCount(0, $jar->get());
    }

    /**
     * Test the loading of the current cookies in to the jar
     * from $_COOKIES
     */
    public function testLoadCurrentCookies()
    {
        $_COOKIE = [
            'test' => 'foo'
        ];
        $jar = new TestJar();
        $jar->loadCurrent();

        $cookies = $jar->get();
        $this->assertCount(1, $cookies);
        $this->assertTrue(isset($cookies['test']));
        $this->assertEquals('test', $cookies['test']->getName());
    }
}

// Test class
class TestJar extends CookieJar
{
    public function add(Cookie $cookie, $overwrite = false)
    {
        $name = $cookie->getName();
        $this->cookies[$name] = $cookie;
    }
}
