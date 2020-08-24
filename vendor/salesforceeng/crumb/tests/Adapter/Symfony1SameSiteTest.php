<?php

namespace SalesforceEng\Crumb;

use SalesforceEng\Crumb\Adapter\Symfony1SameSite;
use Mockery as m;

class Symfony1SameSiteTest extends \PHPUnit_Framework_TestCase
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

        $symfony1SameSite = new Symfony1SameSite($cookie);
        $response = m::mock();
        $response->shouldReceive('setCookie')->withArgs([
            'name1',
            'value1',
            1000,
            '/; SameSite=none',
            '.pardot.com',
            true,
            true
        ]);
        $symfony1SameSite->set($response);
    }
}
