<?php

namespace Slicvic\Geoip\Contracts\Geolocator;

/**
 * Interface for geolocation response.
 *
 * @package Slicvic\Geoip\Contracts\Geolocator
 */
interface ResponseInterface
{
    /**
     * Get HTTP response.
     *
     * @return \Slicvic\Geoip\Contracts\Http\ResponseInterface
     */
    public function getHttpResponse();

    /**
     * Get IP address.
     *
     * @return string
     */
    public function getIp();

    /**
     * Get city name.
     *
     * @return string
     */
    public function getCity();

    /**
     * Get region name.
     *
     * @return string
     */
    public function getRegion();

    /**
     * Get country name.
     *
     * @return string
     */
    public function getCountry();

    /**
     * Get postal code.
     *
     * @return string
     */
    public function getPostal();

    /**
     * Get latitude.
     *
     * @return string
     */
    public function getLatitude();

    /**
     * Get longitude.
     *
     * @return string
     */
    public function getLongitude();
}
