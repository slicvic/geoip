<?php

namespace Slicvic\Geoip\Locator;

/**
 * Locator response interface.
 *
 * @package Slicvic\Geoip\Locator
 */
interface ResponseInterface
{
    /**
     * @return \Slicvic\Geoip\Http\ResponseInterface
     */
    public function getHttpResponse();

    /**
     * @return string
     */
    public function getIp();

    /**
     * @return string
     */
    public function getCity();

    /**
     * @return string
     */
    public function getRegion();

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @return string
     */
    public function getPostal();

    /**
     * @return string
     */
    public function getLatitude();

    /**
     * @return string
     */
    public function getLongitude();
}
