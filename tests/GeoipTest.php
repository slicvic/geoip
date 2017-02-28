<?php

namespace Slicvic\Geoip\Test;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Contracts\Geolocation\LocatorInterface;
use Slicvic\Geoip\Contracts\Geolocation\ResponseInterface;
use Slicvic\Geoip\Geoip;
use Slicvic\Geoip\Geolocation\Clients\FreeGeoIp;
use Slicvic\Geoip\Geolocation\Clients\IpInfo;
use Slicvic\Geoip\Http\Clients\Curl;

class GeoipTest extends TestCase
{
    protected $geoip;

    public function setUp()
    {
        $this->geoip = new Geoip();
    }

    /**
     * @expectedException \TypeError
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Argument 1 passed to Slicvic\Geoip\Geoip::__construct() must implement interface Slicvic\Geoip\Contracts\Geolocation\LocatorInterface
     */
    public function testConstructorExpectsLocatorInterface()
    {
        new Geoip(new \stdClass());
    }

    public function testConstructor()
    {
        // Test with default parameters
        $this->geoip = new Geoip();
        $this->assertInstanceOf(IpInfo::class, $this->geoip->getLocator());

        // Test with mocked parameters
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $locatorStub->method('locate')
            ->willReturn(new \stdClass());
        $this->geoip = new Geoip($locatorStub);
        $this->assertSame($locatorStub, $this->geoip->getLocator());
    }

    /**
     * @expectedException \TypeError
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Argument 1 passed to Slicvic\Geoip\Geoip::setLocator() must implement interface Slicvic\Geoip\Contracts\Geolocation\LocatorInterface
     */
    public function testSetLocatorExpectsLocatorInterface()
    {
        $this->geoip->setLocator(null);
    }

    public function testGetLocator()
    {
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $locatorStub->method('locate')
            ->willReturn(new \stdClass());
        $this->geoip->setLocator($locatorStub);
        $this->assertSame($locatorStub, $this->geoip->getLocator());
    }

    /**
     * @expectedException \Slicvic\Geoip\Exceptions\InvalidResponseException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage Invalid location response, expected instance of \Slicvic\Geoip\Contracts\Geolocation\ResponseInterface
     */
    public function testLocateThrowsInvalidResponseException()
    {
        $locatorStub = $this->getMockBuilder(LocatorInterface::class)
            ->getMock();
        $locatorStub->method('locate')
            ->willReturn(null);
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
        $this->assertSame('-122.0838', $response->getLongitude());
    }

    public function testLocateWithInjectedLocator()
    {
        $ip = '8.8.8.8';
        $httpClient = new Curl();
        $locatorClient = new FreeGeoIp($httpClient);

        // Test constructor injection
        $this->geoip = new Geoip($locatorClient);
        $response = $this->geoip->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame('Mountain View', $response->getCity());
        $this->assertSame('California', $response->getRegion());
        $this->assertSame('US', $response->getCountry());
        $this->assertSame('94035', $response->getPostal());
        $this->assertSame('37.386', $response->getLatitude());
        $this->assertSame('-122.0838', $response->getLongitude());

        // Test setter injection
        $this->geoip = new Geoip();
        $this->geoip->setLocator($locatorClient);
        $response = $this->geoip->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(200, $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame('Mountain View', $response->getCity());
        $this->assertSame('California', $response->getRegion());
        $this->assertSame('US', $response->getCountry());
        $this->assertSame('94035', $response->getPostal());
        $this->assertSame('37.386', $response->getLatitude());
        $this->assertSame('-122.0838', $response->getLongitude());
    }
}
