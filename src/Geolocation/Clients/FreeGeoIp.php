<?php

namespace Slicvic\Geoip\Geolocation\Clients;

use Slicvic\Geoip\Geolocation\Response as GeoResponse;

/**
 * Client for FreeGeoIP.net
 */
class FreeGeoIp extends AbstractClient
{
    const API_URL = 'http://freegeoip.net/json';

    /**
     * {@inheritdoc}
     */
    public function locate($ip)
    {
        $httpResponse = $this->httpClient->get(static::API_URL . '/' . $ip);

        if ($httpResponse->getStatusCode() !== 200) {
            return GeoResponse::create($httpResponse, $ip);
        }

        $locationInfo = json_decode($httpResponse->getBody(), true);

        return GeoResponse::create(
            $httpResponse,
            $locationInfo['ip'],
            $locationInfo['city'],
            $locationInfo['region_name'],
            $locationInfo['country_code'],
            $locationInfo['zip_code'],
            $locationInfo['latitude'],
            $locationInfo['longitude']
        );
    }
}
