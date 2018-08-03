<?php

namespace Slicvic\Geoip\Test;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Locator\LocatorInterface;
use Slicvic\Geoip\Locator\ResponseInterface;
use Slicvic\Geoip\Geoip;
use Slicvic\Geoip\Locator\IpInfo;
use Slicvic\Geoip\Http\Client\Curl;

class GeoipTest extends TestCase
{
    protected $geoip;

    public function setUp()
    {
        $this->geoip = new Geoip();
    }

    public function testDefaultConstructor()
    {
        $this->geoip = new Geoip();
        $this->assertInstanceOf(IpInfo::class, $this->geoip->getLocator());
    }

    /**
     * @expectedException \TypeError
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Argument 1 passed to Slicvic\Geoip\Geoip::__construct() must implement interface Slicvic\Geoip\Locator\LocatorInterface
     */
    public function testConstructorExpectsLocatorInterface()
    {
        new Geoip(new \stdClass());
    }

    public function testConstructorWithMockedParam()
    {
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $this->geoip = new Geoip($locatorStub);
        $this->assertSame($locatorStub, $this->geoip->getLocator());
    }

    /**
     * @expectedException \TypeError
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Argument 1 passed to Slicvic\Geoip\Geoip::setLocator() must implement interface Slicvic\Geoip\Locator\LocatorInterface
     */
    public function testSetLocatorExpectsLocatorInterface()
    {
        $this->geoip->setLocator(null);
    }

    public function testGetLocator()
    {
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $this->geoip->setLocator($locatorStub);
        $this->assertSame($locatorStub, $this->geoip->getLocator());
    }

    /**
     * @expectedException \Slicvic\Geoip\Exceptions\Exception
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Invalid location response, expected instance of \Slicvic\Geoip\Locator\ResponseInterface
     */
    public function testLocateThrowsInvalidResponseException()
    {
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $this->geoip->setLocator($locatorStub);
        $this->geoip->locate('8.8.8.8');
    }

    public function testLocateWithDefaultLocator()
    {
        $ip = '8.8.8.8';
        $this->geoip = new Geoip();
        $response = $this->geoip->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame('Mountain View', $response->getCity());
        $this->assertSame('California', $response->getRegion());
        $this->assertSame('US', $response->getCountry());
        $this->assertSame('94035', $response->getPostal());
        $this->assertSame('37.3860', $response->getLatitude());
        $this->assertSame('-122.0840', $response->getLongitude());
    }

    public function testLocateWithInjectedLocator()
    {
        $ip = '8.8.8.8';
        $locator = new IpInfo();

        // Injection via constructor
        $this->geoip = new Geoip($locator);
        $response = $this->geoip->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame('Mountain View', $response->getCity());
        $this->assertSame('California', $response->getRegion());
        $this->assertSame('US', $response->getCountry());
        $this->assertSame('94035', $response->getPostal());
        $this->assertSame('37.3860', $response->getLatitude());
        $this->assertSame('-122.0840', $response->getLongitude());

        // Injection via setter
        $this->geoip = new Geoip();
        $this->geoip->setLocator($locator);
        $response = $this->geoip->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame('Mountain View', $response->getCity());
        $this->assertSame('California', $response->getRegion());
        $this->assertSame('US', $response->getCountry());
        $this->assertSame('94035', $response->getPostal());
        $this->assertSame('37.3860', $response->getLatitude());
        $this->assertSame('-122.0838', $response->getLongitude());
    }
}
