<?php

namespace Slicvic\Geoip\Test\Locator;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Locator\ResponseInterface;
use Slicvic\Geoip\Locator\IpInfo;
use Slicvic\Geoip\Http\Client\Curl;

class IpInfoTest extends TestCase
{
    protected $client;

    public function setUp()
    {
        $httpClient = new Curl();
        $this->client = new IpInfo($httpClient);
    }

    public function locateDataProvider()
    {
        return [
            [ // Google DNS
                '8.8.8.8',
                [
                    'status' => 200,
                    'city' => 'Mountain View',
                    'region' => 'California',
                    'country' => 'US',
                    'postal' => '94035',
                    'latitude' => '37.3860',
                    'longitude' => '-122.0840'
                ]
            ],
            [ // DNS Advantage
                '156.154.70.1',
                [
                    'status' => 200,
                    'city' => 'Sterling',
                    'region' => 'Virginia',
                    'country' => 'US',
                    'postal' => '20164',
                    'latitude' => '39.0138',
                    'longitude' => '-77.3987'
                ]
            ],
            [ // Yandex.DNS
                '77.88.8.8',
                [
                    'status' => 200,
                    'city' => '',
                    'region' => '',
                    'country' => 'RU',
                    'postal' => '',
                    'latitude' => '55.7386',
                    'longitude' => '37.6068'
                ]
            ],
            [ // Invalid IP
                '0',
                [
                    'status' => 404,
                    'city' => '',
                    'region' => '',
                    'country' => '',
                    'postal' => '',
                    'latitude' => '',
                    'longitude' => ''
                ]
            ],
        ];
    }

    /**
     * @dataProvider locateDataProvider
     */
    public function testLocate($ip, array $expected)
    {
        $response = $this->client->locate($ip);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame($expected['status'], $response->getHttpResponse()->getStatusCode());
        $this->assertSame($ip, $response->getIp());
        $this->assertSame($expected['city'], $response->getCity());
        $this->assertSame($expected['region'], $response->getRegion());
        $this->assertSame($expected['country'], $response->getCountry());
        $this->assertSame($expected['postal'], $response->getPostal());
        $this->assertSame($expected['latitude'], $response->getLatitude());
        $this->assertSame($expected['longitude'], $response->getLongitude());
    }
}
