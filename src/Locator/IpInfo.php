<?php

namespace Slicvic\Geoip\Locator;

use Slicvic\Geoip\Locator\Response;

/**
 * IpInfo.io locator.
 */
class IpInfo extends AbstractLocator
{
    const API_URL = 'http://ipinfo.io';

    /**
     * {@inheritdoc}
     */
    public function locate($ip)
    {
        $httpResponse = $this->httpClient->get(static::API_URL . '/' . $ip . '/json');

        if (200 === $httpResponse->getStatusCode()) {
            $data = json_decode($httpResponse->getBody(), true);

            if (isset($data['ip'])) {
                list($lat, $lon) = isset($data['loc']) ? explode(',', $data['loc']) : ['', ''];
                return (new Response(
                    $httpResponse,
                    $data['ip'],
                    isset($data['city']) ? $data['city'] : '',
                    isset($data['region']) ? $data['region'] : '',
                    isset($data['country']) ? $data['country'] : '',
                    isset($data['postal']) ? $data['postal'] : '',
                    $lat,
                    $lon
                ));
            } else {
                return (new Response($httpResponse, $ip));
            }
        } else {
            return (new Response($httpResponse, $ip));
        }
    }
}
