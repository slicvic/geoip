<?php

namespace Slicvic\Geoip\Geolocation\Clients;

use Slicvic\Geoip\Geolocation\Response as GeoResponse;

/**
 * Client for IpInfo.io
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

        $locationInfo = json_decode($httpResponse->getBody(), true);

        if (!isset($locationInfo['ip'])) {
            return GeoResponse::create($httpResponse, $ip);
        }

        $locationInfo['loc'] = (isset($locationInfo['loc'])) ? explode(',', $locationInfo['loc']) : ['', ''];

        return GeoResponse::create(
            $httpResponse,
            $locationInfo['ip'],
            (isset($locationInfo['city'])) ? $locationInfo['city'] : '',
            (isset($locationInfo['region'])) ? $locationInfo['region'] : '',
            (isset($locationInfo['country'])) ? $locationInfo['country'] : '',
            (isset($locationInfo['postal'])) ? $locationInfo['postal'] : '',
            $locationInfo['loc'][0],
            $locationInfo['loc'][1]
        );
    }
}
