<?php

class ExceptionsTest extends \PHPUnit_Framework_TestCase
{
	public function dataExceptionThrown()
	{
		return [
			[GeoIPSharedMemoryException::class, GEOIP_SHARED_MEMORY],
			[GeoIPException::class, 0],
		];
	}

	/**
	 * @dataProvider dataExceptionThrown
	 * @param string $exceptionClass
	 * @param int $flags
	 */
	public function testExceptionThrown($exceptionClass, $flags)
	{
		$this->setExpectedException($exceptionClass);

		$geoip = new GeoIP();
		$geoip->flags = $flags;
		_geoip_throw_error($geoip, "This is a test");
	}
}
