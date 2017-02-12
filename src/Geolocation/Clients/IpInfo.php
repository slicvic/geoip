<?php

namespace Slicvic\Geoip\Geolocation\Clients;

use Slicvic\Geoip\Geolocation\Response as GeoResponse;

/**
 * Client for ipinfo.io IP lookup API.
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

        $decodedBody = json_decode($httpResponse->getBody(), true);

        if (!isset($decodedBody['ip'])) {
            return GeoResponse::create($httpResponse, $ip);
        }

        if (isset($decodedBody['loc']) and strpos($decodedBody['loc'], ',') !== false) {
            list($latitude, $longitude) = explode(',', $decodedBody['loc']);
        } else {
            $latitude = $longitude = '';
        }

        return GeoResponse::create(
            $httpResponse,
            $decodedBody['ip'],
            (isset($decodedBody['city'])) ? $decodedBody['city'] : '',
            (isset($decodedBody['region'])) ? $decodedBody['region'] : '',
            (isset($decodedBody['country'])) ? $decodedBody['country'] : '',
            (isset($decodedBody['postal'])) ? $decodedBody['postal'] : '',
            $latitude,
            $longitude
        );
    }
}
