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

            if (!empty($data['ip'])) {
                $latlng = !empty($data['loc']) ? explode(',', $data['loc']) : null;
                return (new Response(
                        $httpResponse,
                        $data['ip'],
                        !empty($data['city']) ? $data['city'] : '',
                        !empty($data['region']) ? $data['region'] : '',
                        !empty($data['country']) ? $data['country'] : '',
                        !empty($data['postal']) ? $data['postal'] : '',
                        !empty($latlng[0]) ? $latlng[0] : '',
                        !empty($latlng[1]) ? $latlng[1] : ''
                    ));
            } else {
                return (new Response($httpResponse, $ip));
            }
        } else {
            return (new Response($httpResponse, $ip));
        }
    }
}
