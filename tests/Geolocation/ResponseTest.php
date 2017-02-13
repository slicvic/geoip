<?php

namespace Slicvic\Geoip\Test\Geolocation;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Http\Response as HttpResponse;
use Slicvic\Geoip\Geolocation\Response as GeoResponse;

class ResponseTest extends TestCase
{
    public function testConstructorAndGetters()
    {
        $ip = '127.0.0.1';
        $city = 'Miami';
        $region = 'Flordia';
        $country = 'USA';
        $postal = '33012';
        $latitude = '25.761680';
        $longitude = '-80.191790';
        $httpResponse = new HttpResponse(
            '<!doctype html><html><head><title></title></head><body></body></html>',
            200,
            ['content_type' => 'text/html']
        );

        // Test default parameters
        $response = new GeoResponse($httpResponse);
        $this->assertSame($httpResponse, $response->getHttpResponse());
        $this->assertSame('', $response->getIp());
        $this->assertSame('', $response->getCity());
        $this->assertSame('', $response->getRegion());
        $this->assertSame('', $response->getCountry());
        $this->assertSame('', $response->getPostal());
        $this->assertSame('', $response->getLatitude());
        $this->assertSame('', $response->getLongitude());

        // Test actual parameters
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

    public function testCreate()
    {
        $ip = '127.0.0.1';
        $city = 'Miami';
        $region = 'Flordia';
        $country = 'USA';
        $postal = '33012';
        $latitude = '25.761680';
        $longitude = '-80.191790';
        $httpResponse = new HttpResponse(
            '<!doctype html><html><head><title></title></head><body></body></html>',
            200,
            ['content_type' => 'text/html']
        );

        // Test default parameters
        $response = GeoResponse::create($httpResponse);
        $this->assertSame($httpResponse, $response->getHttpResponse());
        $this->assertSame('', $response->getIp());
        $this->assertSame('', $response->getCity());
        $this->assertSame('', $response->getRegion());
        $this->assertSame('', $response->getCountry());
        $this->assertSame('', $response->getPostal());
        $this->assertSame('', $response->getLatitude());
        $this->assertSame('', $response->getLongitude());

        // Test actual parameters
        $response = GeoResponse::create($httpResponse, $ip, $city, $region, $country, $postal, $latitude, $longitude);
        $this->assertInstanceOf(GeoResponse::class, $response);
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
