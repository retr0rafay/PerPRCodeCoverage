<?php

namespace SalesforceEng\Crumb;

use SalesforceEng\Crumb\Adapter\Symfony1;
use Mockery as m;

class Symfony1Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $_SERVER['HTTP_HOST'] = 'localhost.com';
    }

    public function testSet()
    {
        $cookie = new Cookie('name1', 'value1');
        $cookie->setTimeout(1000);
        $cookie->setPath('/');
        $cookie->setDomain('.pardot.com');
        $cookie->setSecure(true);
        $cookie->setHttpOnly(true);
        $cookie->setSameSite('none');

        $symfony1 = new Symfony1($cookie);
        $response = m::mock();
        $response->shouldReceive('setCookie')->withArgs([
            'name1',
            'value1',
            1000,
            '/',
            '.pardot.com',
            true,
            true
        ]);
        $symfony1->set($response);
    }
}
