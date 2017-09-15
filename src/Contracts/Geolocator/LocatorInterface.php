<?php

namespace Slicvic\Geoip\Contracts\Geolocator;

/**
 * Interface for geolocation services.
 *
 * @package Slicvic\Geoip\Contracts\Geolocator
 */
interface LocatorInterface
{
    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return \Slicvic\Geoip\Contracts\Geolocator\ResponseInterface
     */
    public function locate($ip);
}
