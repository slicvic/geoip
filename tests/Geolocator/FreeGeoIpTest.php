<?php

namespace Slicvic\Geoip\Test\Geolocator;

use Slicvic\Geoip\Geolocator\FreeGeoIp;
use Slicvic\Geoip\Http\Clients\Curl;

class FreeGeoIpTest extends IpInfoTest
{
    public function setUp()
    {
        $httpClient = new Curl();
        $this->client = new FreeGeoIp($httpClient);
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
                    'latitude' => '37.386',
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
                    'longitude' => '-77.3937'
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
}
