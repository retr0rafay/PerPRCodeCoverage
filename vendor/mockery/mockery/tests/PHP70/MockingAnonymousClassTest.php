<?php
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

declare(strict_types=1); // Use strict types to ensure exact types are returned or passed

namespace test\Mockery;

use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @requires PHP 7.0.0-dev
 */
class MockingAnonymousClassTest extends MockeryTestCase
{
    public function testMockFromAnonymousClassName()
    {
        $anonymousClassName = get_class(new class() {
        });

        $mock = mock($anonymousClassName);

        $this->assertInstanceOf($anonymousClassName, $mock);
    }

    public function testMockFromAnonymousClassInstance()
    {
        $anonymousClass = new class() {
        };

        $mock = mock($anonymousClass);

        $this->assertInstanceOf(get_class($anonymousClass), $mock);
    }
}
