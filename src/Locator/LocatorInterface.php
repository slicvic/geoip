<?php

namespace Slicvic\Geoip\Locator;

/**
 * Locator interface.
 *
 * @package Slicvic\Geoip\Locator
 */
interface LocatorInterface
{
    /**
     * Find location by IP address.
     *
     * @param  string $ip
     * @return \Slicvic\Geoip\Locator\ResponseInterface
     */
    public function locate($ip);
}
