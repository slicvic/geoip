<?php

namespace Slicvic\Geoip\Geolocation\Clients;

use Slicvic\Geoip\Geolocation\Response as GeoResponse;

/**
 * Client for http://ipinfo.io IP lookup API.
 */
class IpInfo extends AbstractClient
{
    const API_URL = 'http://ipinfo.io';

    /**
     * {@inheritdoc}
     */
    public function locate($ip)
    {
        $httpResponse = $this->httpClient->get(static::API_URL . '/' . $ip . '/json');

        if ($httpResponse->getStatusCode() !== 200) {
            return GeoResponse::create($httpResponse, $ip);
        }

        $locationData = json_decode($httpResponse->getBody(), true);

        if (!isset($locationData['ip'])) {
            return GeoResponse::create($httpResponse, $ip);
        }

        $latitude = $longitude = '';
        if (isset($locationData['loc']) and strpos($locationData['loc'], ',') !== false) {
            list($latitude, $longitude) = explode(',', $locationData['loc']);
        }

        return GeoResponse::create(
            $httpResponse,
            $locationData['ip'],
            (isset($locationData['city'])) ? $locationData['city'] : '',
            (isset($locationData['region'])) ? $locationData['region'] : '',
            (isset($locationData['country'])) ? $locationData['country'] : '',
            (isset($locationData['postal'])) ? $locationData['postal'] : '',
            $latitude,
            $longitude
        );
    }
}
