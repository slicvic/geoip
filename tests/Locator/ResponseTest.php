<?php

namespace Slicvic\Geoip\Test\Locator;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Response as HttpResponse;
use Slicvic\Geoip\Locator\Response as GeoResponse;

class ResponseTest extends TestCase
{
    public function testDefaultConstructor()
    {
        $ip = '127.0.0.1';
        $city = 'Miami';
        $region = 'Florida';
        $country = 'USA';
        $postal = '33012';
        $latitude = '25.761680';
        $longitude = '-80.191790';
        $httpResponse = new HttpResponse(
            '<!doctype html><html><head><title></title></head><body></body></html>',
            200,
            ['content_type' => 'text/html']
        );

        $response = new GeoResponse($httpResponse);
        $this->assertSame($httpResponse, $response->getHttpResponse());
        $this->assertSame('', $response->getIp());
        $this->assertSame('', $response->getCity());
        $this->assertSame('', $response->getRegion());
        $this->assertSame('', $response->getCountry());
        $this->assertSame('', $response->getPostal());
        $this->assertSame('', $response->getLatitude());
        $this->assertSame('', $response->getLongitude());
    }

    public function testConstructorWithAllParams()
    {
        $ip = '127.0.0.1';
        $city = 'Miami';
        $region = 'Florida';
        $country = 'USA';
        $postal = '33012';
        $latitude = '25.761680';
        $longitude = '-80.191790';
        $httpResponse = new HttpResponse(
            '<!doctype html><html><head><title></title></head><body></body></html>',
            200,
            ['content_type' => 'text/html']
        );

        $response = new GeoResponse($httpResponse, $ip, $city, $region, $country, $postal, $latitude, $longitude);
        $this->assertSame($httpResponse, $response->getHttpResponse());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame($city, $response->getCity());
        $this->assertSame($region, $response->getRegion());
        $this->assertSame($country, $response->getCountry());
        $this->assertSame($postal, $response->getPostal());
        $this->assertSame($latitude, $response->getLatitude());
        $this->assertSame($longitude, $response->getLongitude());
    }
}
