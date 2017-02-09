<?php

namespace Slicvic\Geoip\Contracts;

/**
 * Interface for location services.
 *
 * @package Slicvic\Geoip\Contracts
 */
interface LocatorInterface
{
    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return \Slicvic\Geoip\Response
     */
    public function locate($ip);
}
