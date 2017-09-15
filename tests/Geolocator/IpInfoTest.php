<?php

namespace Slicvic\Geoip\Test\Geolocator;

use PHPUnit\Framework\TestCase;
use Slicvic\Geoip\Contracts\Geolocator\ResponseInterface;
use Slicvic\Geoip\Geolocator\IpInfo;
use Slicvic\Geoip\Http\Clients\Curl;

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
                    'longitude' => '-122.0838'
                ]
            ],
            [ // DNS Advantage
                '156.154.70.1',
                [
                    'status' => 200,
                    'city' => 'Herndon',
                    'region' => 'Virginia',
                    'country' => 'US',
                    'postal' => '20171',
                    'latitude' => '38.9266',
                    'longitude' => '-77.3936'
                ]
            ],
            [ // Yandex.DNS
                '77.88.8.8',
                [
                    'status' => 200,
                    'city' => 'Saint Petersburg',
                    'region' => 'St.-Petersburg',
                    'country' => 'RU',
                    'postal' => '197755',
                    'latitude' => '60.0136',
                    'longitude' => '30.0136'
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
