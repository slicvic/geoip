<?php

namespace Slicvic\Geoip\Contracts\Geolocation;

/**
 * Interface for Geolocation clients.
 *
 * @package Slicvic\Geoip\Contracts\Geolocation
 */
interface LocatorInterface
{
    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return \Slicvic\Geoip\Contracts\Geolocation\ResponseInterface
     */
    public function locate($ip);
}
